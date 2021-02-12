<?php

namespace App\Http\Controllers;

use App\Repositories\AbstractRepository;
use App\Services\RequestTransformer;
use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

abstract class AbstractRestController
{
    /** @var AbstractRepository */
    protected AbstractRepository $repository;

    /** @var Request */
    protected Request $request;

    public function __construct(AbstractRepository $abstractRepository, Request $request)
    {
        $this->repository = $abstractRepository;
        $this->request = $request;
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $validator = Validator::make($this->request->all(), $this->getValidationRulesForSorting());

        if ($validator->fails()) {
            return new JsonResponse(['errors' => 'Invalid data'], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $sortField = $this->request->input('sort_field', null);
        $sortDirection = $this->request->input('sort_direction', null);
        $page = (int)$this->request->input('page', 1);

        $models = $this->repository->sortAndPaginate($sortField, $sortDirection, $page);
        $lastPage = $this->repository->getLastPage();

        return new JsonResponse([
            'models' => $models,
            'lastPage' => $lastPage
        ]);
    }


    /**
     * @return JsonResponse
     */
    public function store(): JsonResponse
    {
        $validator = Validator::make($this->request->all(), $this->getValidationRules());

        if ($validator->fails()) {
            return new JsonResponse(['errors' => 'Invalid data'], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        RequestTransformer::transform($this->request, $this->getStoreRequestDataTransformers());
        $model = $this->repository->create($this->request->all());

        if (!$model) {
            return new JsonResponse(['errors' => 'Model was not created'], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return new JsonResponse($model->toArray());
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $model = $this->repository->find($id);

        if (!$model) {
            return new JsonResponse(['errors' => 'Model not found'], Response::HTTP_NOT_FOUND);
        }

        return new JsonResponse($model->toArray());
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function update(int $id): JsonResponse
    {
        $validator = Validator::make($this->request->all(), $this->getValidationRules());

        if ($validator->fails()) {
            return new JsonResponse(['errors' => 'Invalid data'], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        RequestTransformer::transform($this->request, $this->getUpdateRequestDataTransformers());
        $model = $this->repository->update($id, $this->request->all());

        if (!$model) {
            return new JsonResponse(['errors' => 'Model was not updated.'], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return new JsonResponse($model->toArray());
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $deleted = $this->repository->delete($id);

        if (!$deleted) {
            return new JsonResponse(['errors' => 'Model was not deleted'], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return new JsonResponse(['message' => 'Model was deleted successfully']);
    }

    /**
     * @return string[]
     */
    protected function getValidationRulesForSorting(): array
    {
        return [
            'sort_field' => 'nullable|string',
            'sort_direction' => 'nullable|string',
            'page' => 'nullable|integer',
        ];
    }

    /**
     * @return Closure[]
     */
    protected function getStoreRequestDataTransformers(): array
    {
        return [];
    }

    /**
     * @return Closure[]
     */
    protected function getUpdateRequestDataTransformers(): array
    {
        return [];
    }

    /**
     * @return array
     */
    abstract protected function getValidationRules(): array;
}
