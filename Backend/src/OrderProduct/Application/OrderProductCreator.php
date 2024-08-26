<?php

namespace Src\OrderProduct\Application;

use Src\OrderProduct\Domain\OrderProduct;
use Src\OrderProduct\Domain\OrderProductRepositoryInterface;
use Src\Shared\Domain\Interfaces\ServiceInterface;
use Src\Shared\Domain\ValueObjects\NumFloat;
use Src\Shared\Domain\ValueObjects\NumInteger;

class OrderProductCreator implements ServiceInterface
{

    private OrderProductRepositoryInterface $repository;

    public function __construct(OrderProductRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function handle(
        int $id_order,
        int $id_product,
        int $quantity,
        float $price
    ): OrderProduct {
        $OrderProduct = new OrderProduct(
            new NumInteger($id_order),
            new NumInteger($id_product),
            new NumInteger($quantity),
            new NumFloat($price)
        );
        $this->repository->create($OrderProduct);
        return $OrderProduct;
    }

}
