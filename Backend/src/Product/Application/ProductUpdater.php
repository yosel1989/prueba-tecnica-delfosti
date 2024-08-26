<?php

namespace Src\Product\Application;

use Src\Product\Domain\Product;
use Src\Product\Domain\ProductRepostioryInterface;
use Src\Shared\Domain\Interfaces\ServiceInterface;
use Src\Shared\Domain\ValueObjects\NumFloat;
use Src\Shared\Domain\ValueObjects\NumInteger;
use Src\Shared\Domain\ValueObjects\Text;

class ProductUpdater implements ServiceInterface
{

    private ProductRepostioryInterface $repository;

    public function __construct(ProductRepostioryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function handle(
        int $id,
        string $sku,
        string $name,
        int $type_product_id,
        string $tags,
        float $price,
        int $unit_measurement_id,
        int $stock
    ): Product {
        $product = new Product(
            new NumInteger($id),
            new Text($sku),
            new Text($name),
            new NumInteger($type_product_id),
            new Text($tags),
            new NumFloat($price),
            new NumInteger($unit_measurement_id),
            new NumInteger($stock)
        );

        $this->repository->update($product);

        return $product;
    }

}
