<?php

namespace Src\User\Domain;

class UserList
{
    /**
     * @var User[] The collection
     */
    private array $list;

    /**
     * The constructor.
     *
     * @param User ...$collection The collection
     */
    public function __construct(User ...$collection)
    {
        $this->list = $collection;
    }

    /**
     * Add model to list.
     *
     * @param User $model The model
     *
     * @return void
     */
    public function add(User $model): void
    {
        $this->list[] = $model;
    }

    /**
     * Get all collection.
     *
     * @return User[] The collection
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

