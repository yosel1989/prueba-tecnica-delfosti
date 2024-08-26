<?php

namespace Tests\Src\Product\Infrastructure;

use Src\Product\Domain\Product;
use Src\Product\Domain\ProductRepostioryInterface;
use Src\Shared\Domain\ValueObjects\NumInteger;

class ProductRepositoryFake implements ProductRepostioryInterface
{
    public bool $callMethodCreate = false;
    public bool $callMethodUpdate = false;
    public bool $callMethodDelete = false;
    public bool $callMethodList = false;


    public function create(Product $product): void
    {
        $this->callMethodCreate = true;
    }

    public function update(Product $product): void
    {
        $this->callMethodUpdate = true;
    }

    public function delete(NumInteger $idProduct): void
    {
        $this->callMethodDelete = true;
    }

    public function list(): array
    {
        $this->callMethodList = true;
        return array();
    }
}
