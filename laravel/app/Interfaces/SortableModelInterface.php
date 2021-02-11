<?php

namespace App\Interfaces;

interface SortableModelInterface
{
    /**
     * @return array
     */
    public function getSortableFields(): array;

    /**
     * @return string
     */
    public function getDefaultSortField(): string;
}
