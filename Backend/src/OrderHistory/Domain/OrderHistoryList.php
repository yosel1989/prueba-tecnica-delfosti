<?php

namespace Src\OrderHistory\Domain;

class OrderHistoryList
{
    /**
     * @var OrderHistory[] The collection
     */
    private array $list;

    /**
     * The constructor.
     *
     * @param OrderHistory ...$collection The collection
     */
    public function __construct(OrderHistory ...$collection)
    {
        $this->list = $collection;
    }

    /**
     * Add model to list.
     *
     * @param OrderHistory $model The model
     *
     * @return void
     */
    public function add(OrderHistory $model): void
    {
        $this->list[] = $model;
    }

    /**
     * Get all collection.
     *
     * @return OrderHistory[] The collection
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

