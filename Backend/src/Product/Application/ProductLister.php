<?php

namespace Src\Product\Application;

use Src\Product\Domain\Product;
use Src\Product\Domain\ProductList;
use Src\Product\Domain\ProductRepostioryInterface;
use Src\Shared\Domain\Interfaces\ServiceInterface;
use Src\Shared\Domain\ValueObjects\NumFloat;
use Src\Shared\Domain\ValueObjects\NumInteger;
use Src\Shared\Domain\ValueObjects\Text;

class ProductLister implements ServiceInterface
{

    private ProductRepostioryInterface $repository;

    public function __construct(ProductRepostioryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @throws \Exception
     */
    public function handle(): ProductList
    {
        $list = new ProductList();
        foreach ($this->repository->list() as $item) {
            $list->add(new Product(
                new NumInteger($item['id']),
                new Text($item['sku']),
                new Text($item['name']),
                new NumInteger($item['type_product_id']),
                new Text($item['tags']),
                new NumFloat($item['price']),
                new NumInteger($item['unit_measurement_id']),
                new NumInteger($item['stock'])
            ));
        }
        return $list;
    }

}
