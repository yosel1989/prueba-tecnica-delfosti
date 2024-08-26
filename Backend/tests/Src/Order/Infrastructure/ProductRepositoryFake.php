<?php

namespace Tests\Src\Order\Infrastructure;

use Src\Order\Domain\Order;
use Src\Order\Domain\OrderRepostioryInterface;
use Src\Shared\Domain\ValueObjects\NumInteger;

class OrderRepositoryFake implements OrderRepostioryInterface
{
    public bool $callMethodCreate = false;
    public bool $callMethodUpdate = false;
    public bool $callMethodDelete = false;
    public bool $callMethodList = false;


    public function create(Order $Order): void
    {
        $this->callMethodCreate = true;
    }

    public function update(Order $Order): void
    {
        $this->callMethodUpdate = true;
    }

    public function delete(NumInteger $idOrder): void
    {
        $this->callMethodDelete = true;
    }

    public function list(): array
    {
        $this->callMethodList = true;
        return array();
    }
}
