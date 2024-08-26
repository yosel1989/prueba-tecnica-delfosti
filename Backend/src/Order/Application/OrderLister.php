<?php

namespace Src\Order\Application;

use Src\Order\Domain\Order;
use Src\Order\Domain\OrderList;
use Src\Order\Domain\OrderRepositoryInterface;
use Src\OrderHistory\Domain\OrderHistory;
use Src\OrderHistory\Domain\OrderHistoryList;
use Src\Shared\Domain\Interfaces\ServiceInterface;
use Src\Shared\Domain\ValueObjects\NumFloat;
use Src\Shared\Domain\ValueObjects\NumInteger;
use Src\Shared\Domain\ValueObjects\Text;
use Src\User\Domain\User;

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
            $order =  new Order(
                new NumInteger($item['id']),
                new NumInteger($item['id_vendor']),
                new NumInteger($item['id_delivery']),
                new Text($item['date_delivery']),
                new NumInteger($item['id_status'])
            );
            $order->setStatus(new Text($item['status']['name']));
            $order->setTotal(new NumFloat($item['total']));
            $order->setCreatedAt(new Text($item['created_at']));
            $order->setVendor(new User(
                new NumInteger($item['vendor']['id']),
                new Text($item['vendor']['code']),
                new Text($item['vendor']['name']),
                new Text($item['vendor']['lastname']),
                new Text($item['vendor']['email']),
                new Text($item['vendor']['phone']),
                new Text(''),
                new Text(''),
                new NumInteger($item['vendor']['id_position']),
                new NumInteger($item['vendor']['id_rol']),
            ));
            $order->setHistory(new OrderHistoryList());

            foreach ($item['history'] as $history) {
                $Ohistory = new OrderHistory(
                    new NumInteger($history['id_order']),
                    new NumInteger($history['id_status']),
                    new Text($history['created_at'])
                );
                $Ohistory->setStatus(new Text($history['status']['name']));
                $order->getHistory()->add($Ohistory);
            }


            $list->add($order);
        }
        return $list;
    }

}
