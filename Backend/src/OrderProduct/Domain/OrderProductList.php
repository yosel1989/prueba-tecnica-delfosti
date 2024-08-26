<?php

namespace Src\OrderProduct\Domain;

class OrderProductList
{
    /**
     * @var OrderProduct[] The collection
     */
    private array $list;

    /**
     * The constructor.
     *
     * @param OrderProduct ...$collection The collection
     */
    public function __construct(OrderProduct ...$collection)
    {
        $this->list = $collection;
    }

    /**
     * Add model to list.
     *
     * @param OrderProduct $model The model
     *
     * @return void
     */
    public function add(OrderProduct $model): void
    {
        $this->list[] = $model;
    }

    /**
     * Get all collection.
     *
     * @return OrderProduct[] The collection
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

