<?php

namespace Src\Product\Infrastructure;

use App\Models\Product as ModelsProduct;
use Src\Product\Domain\Product;
use Src\Product\Domain\ProductRepostioryInterface;
use Src\Shared\Domain\ValueObjects\NumInteger;

class ProductRepositoryEloquent implements ProductRepostioryInterface
{

    public function create(Product $product): void
    {
        ModelsProduct::create([
            'sku'                   => $product->getSku()->value(),
            'name'                  => $product->getName()->value(),
            'type_product_id'       => $product->getTypeProductId()->value(),
            'tags'                  => $product->getTags()->value(),
            'price'                 => $product->getPrice()->value(),
            'unit_measurement_id'   => $product->getUnitMeasurementId()->value(),
            'stock'                 => $product->getStock()->value(),
        ]);
    }

    public function update(Product $product): void
    {
        ModelsProduct::findOrFail($product->getId()->value())->update([
            'sku'                   => $product->getSku()->value(),
            'name'                  => $product->getName()->value(),
            'type_product_id'       => $product->getTypeProductId()->value(),
            'tags'                  => $product->getTags()->value(),
            'price'                 => $product->getPrice()->value(),
            'unit_measurement_id'   => $product->getUnitMeasurementId()->value(),
            'stock'                 => $product->getStock()->value(),
        ]);
    }

    public function delete(NumInteger $idProduct): void
    {
        ModelsProduct::findOrFail($idProduct->value())->delete();
    }

    public function list(): array
    {
        return ModelsProduct::with('type_product', 'unit_measurement')->get()->toArray();
    }
}
