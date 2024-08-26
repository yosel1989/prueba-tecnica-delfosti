<?php

namespace Src\Order\Domain;

class OrderList
{
    /**
     * @var Order[] The collection
     */
    private array $list;

    /**
     * The constructor.
     *
     * @param Order ...$collection The collection
     */
    public function __construct(Order ...$collection)
    {
        $this->list = $collection;
    }

    /**
     * Add model to list.
     *
     * @param Order $model The model
     *
     * @return void
     */
    public function add(Order $model): void
    {
        $this->list[] = $model;
    }

    /**
     * Get all collection.
     *
     * @return Order[] The collection
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

