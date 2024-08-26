<?php

namespace Src\OrderProduct\Application;

use Src\OrderProduct\Domain\OrderProduct;
use Src\OrderProduct\Domain\OrderProductList;
use Src\OrderProduct\Domain\OrderProductRepositoryInterface;
use Src\Shared\Domain\Interfaces\ServiceInterface;
use Src\Shared\Domain\ValueObjects\NumFloat;
use Src\Shared\Domain\ValueObjects\NumInteger;
use Src\Shared\Domain\ValueObjects\Text;

class OrderProductLister implements ServiceInterface
{

    private OrderProductRepositoryInterface $repository;

    public function __construct(OrderProductRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @throws \Exception
     */
    public function handle(): OrderProductList
    {
        $list = new OrderProductList();
        foreach ($this->repository->list() as $item) {
            $list->add(new OrderProduct(
                new NumInteger($item['id']),
                new Text($item['sku']),
                new Text($item['name']),
                new NumInteger($item['type_OrderProduct_id']),
                new Text($item['tags']),
                new NumFloat($item['price']),
                new NumInteger($item['unit_measurement_id']),
                new NumInteger($item['stock'])
            ));
        }
        return $list;
    }

}
