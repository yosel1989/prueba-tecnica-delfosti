<?php

namespace Src\OrderProduct\Infrastructure;

use App\Models\OrderProduct as ModelsOrderProduct;
use Src\OrderProduct\Domain\OrderProduct;
use Src\OrderProduct\Domain\OrderProductRepositoryInterface;
use Src\Shared\Domain\ValueObjects\NumInteger;

class OrderProductRepositoryEloquent implements OrderProductRepositoryInterface
{

    public function create(OrderProduct $OrderProduct): void
    {
        ModelsOrderProduct::create([
            'id_order'          => $OrderProduct->getIdOrder()->value(),
            'id_product'        => $OrderProduct->getIdProduct()->value(),
            'quantity'          => $OrderProduct->getQuantity()->value(),
            'price'             => $OrderProduct->getPrice()->value(),
        ]);
    }

    public function update(OrderProduct $OrderProduct): void
    {
        ModelsOrderProduct::findOrFail($OrderProduct->getId()->value())->update([
            'sku'                   => $OrderProduct->getSku()->value(),
            'name'                  => $OrderProduct->getName()->value(),
            'type_OrderProduct_id'       => $OrderProduct->getTypeOrderProductId()->value(),
            'tags'                  => $OrderProduct->getTags()->value(),
            'price'                 => $OrderProduct->getPrice()->value(),
            'unit_measurement_id'   => $OrderProduct->getUnitMeasurementId()->value(),
            'stock'                 => $OrderProduct->getStock()->value(),
        ]);
    }

    public function delete(NumInteger $idOrderProduct): void
    {
        ModelsOrderProduct::findOrFail($idOrderProduct->value())->delete();
    }

    public function list(): array
    {
        return ModelsOrderProduct::all()->toArray();
    }
}
