<?php

namespace App\Repositories;

use App\Interfaces\SortableModelInterface;
use Exception;
use Illuminate\Container\Container;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository
{
    private const ASC_DIRECTION = 'ASC';
    private const DESC_DIRECTION = 'DESC';
    private const ALLOWED_DIRECTIONS = [
        self::ASC_DIRECTION,
        self::DESC_DIRECTION
    ];

    /** @var Model */
    protected Model $model;

    /** @var int */
    protected int $recordPerPage = 10;

    /**
     * @param Container $container
     * @throws BindingResolutionException
     */
    public function __construct(Container $container)
    {
        $modelClass = $this->getModelClass();
        $model = $container->make($modelClass);
        $this->model = $model;
    }

    /**
     * @param int $id
     * @return Model|null
     */
    public function find(int $id): ?Model
    {
        return $this->getBuilder()->find($id);
    }

    /**
     * @param string|null $sortField
     * @param string|null $sortDirection
     * @param int $lastDisplayedId
     * @return Collection|Model[]
     */
    public function sortAndPaginate(
        ?string $sortField = null,
        ?string $sortDirection = null,
        int $lastDisplayedId = 0
    ): iterable {
        $builder = $this->getBuilder();
        $sortField = $this->validateSortField($sortField);

        if ($sortField) {
            $sortDirection = $this->getSortDirection($sortDirection);
            $builder = $builder->orderBy($sortField, $sortDirection);
        }

        $primaryKey = $this->model->getKeyName();

        return $builder
            ->where($primaryKey, '>', $lastDisplayedId)
            ->limit($this->recordPerPage)
            ->get()
        ;
    }

    /**
     * @param array $data
     * @return Model|null
     */
    public function create(array $data): ?Model
    {
        try {
            $model = $this->getBuilder()->create($data);
        } catch (Exception $exception) {
            return null;
        }

        return $model;
    }

    /**
     * @param int $id
     * @param array $data
     * @return Model|null
     */
    public function update(int $id, array $data): ?Model
    {
        $model = $this->find($id);

        if (!$model) {
            return null;
        }

        try {
            $model->update($data);
        } catch (Exception $exception) {
            return null;
        }

        return $model;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        $model = $this->find($id);

        if (!$model) {
            return false;
        }

        try {
            $deleted = (bool)$model->delete();
        } catch (Exception $exception) {
            $deleted = false;
        }

        return $deleted;
    }

    /**
     * @return Collection|Model[]
     */
    public function all(): iterable
    {
        return $this->getBuilder()->get();
    }

    /**
     * @return Builder
     */
    private function getBuilder(): Builder
    {
        return $this->model->newModelQuery();
    }

    /**
     * @param string|null $sortDirection
     * @return string
     */
    private function getSortDirection(?string $sortDirection): string
    {
        $sortDirection = strtoupper($sortDirection);

        if (in_array($sortDirection, self::ALLOWED_DIRECTIONS)) {
            return $sortDirection;
        }

        return self::ASC_DIRECTION;
    }

    /**
     * @param string|null $sortField
     * @return string|null
     */
    private function validateSortField(?string $sortField): ?string
    {
        if (!$sortField || !$this->model instanceof SortableModelInterface) {
            return null;
        }

        if (!in_array($sortField, $this->model->getSortableFields())) {
            return $this->model->getDefaultSortField();
        }

        return $sortField;
    }

    /**
     * @return string
     */
    abstract public function getModelClass(): string;
}
