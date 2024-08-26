<?php

namespace Src\Order\Application;

use Src\Order\Domain\Order;
use Src\Order\Domain\OrderList;
use Src\Order\Domain\OrderRepositoryInterface;
use Src\Shared\Domain\Interfaces\ServiceInterface;
use Src\Shared\Domain\ValueObjects\NumFloat;
use Src\Shared\Domain\ValueObjects\NumInteger;
use Src\Shared\Domain\ValueObjects\Text;

class OrderLister implements ServiceInterface
{

    private OrderRepositoryInterface $repository;

    public function __construct(OrderRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @throws \Exception
     */
    public function handle(): OrderList
    {
        $list = new OrderList();
        foreach ($this->repository->list() as $item) {
            $list->add(new Order(
                new NumInteger($item['id']),
                new Text($item['sku']),
                new Text($item['name']),
                new NumInteger($item['type_Order_id']),
                new Text($item['tags']),
                new NumFloat($item['price']),
                new NumInteger($item['unit_measurement_id']),
                new NumInteger($item['stock'])
            ));
        }
        return $list;
    }

}
