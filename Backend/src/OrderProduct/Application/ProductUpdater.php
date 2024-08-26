<?php

namespace Src\OrderProductProduct\Application;

use Src\OrderProduct\Domain\OrderProduct;
use Src\OrderProduct\Domain\OrderProductRepositoryInterface;
use Src\Shared\Domain\Interfaces\ServiceInterface;
use Src\Shared\Domain\ValueObjects\NumFloat;
use Src\Shared\Domain\ValueObjects\NumInteger;
use Src\Shared\Domain\ValueObjects\Text;

class OrderProductUpdater implements ServiceInterface
{

    private OrderProductRepositoryInterface $repository;

    public function __construct(OrderProductRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function handle(
        int $id,
        string $sku,
        string $name,
        int $type_OrderProduct_id,
        string $tags,
        float $price,
        int $unit_measurement_id,
        int $stock
    ): OrderProduct {
        $OrderProduct = new OrderProduct(
            new NumInteger($id),
            new Text($sku),
            new Text($name),
            new NumInteger($type_OrderProduct_id),
            new Text($tags),
            new NumFloat($price),
            new NumInteger($unit_measurement_id),
            new NumInteger($stock)
        );

        $this->repository->update($OrderProduct);

        return $OrderProduct;
    }

}
