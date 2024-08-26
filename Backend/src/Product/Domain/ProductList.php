<?php

namespace Src\Product\Domain;

class ProductList
{
    /**
     * @var Product[] The collection
     */
    private array $list;

    /**
     * The constructor.
     *
     * @param Product ...$collection The collection
     */
    public function __construct(Product ...$collection)
    {
        $this->list = $collection;
    }

    /**
     * Add model to list.
     *
     * @param Product $model The model
     *
     * @return void
     */
    public function add(Product $model): void
    {
        $this->list[] = $model;
    }

    /**
     * Get all collection.
     *
     * @return Product[] The collection
     */
    public function all(): array
    {
        return $this->list;
    }


    /**
     * Get count collection.
     *
     * @return int The collection
     */
    public function count(): int
    {
        return count($this->list);
    }
}

