<?php

namespace Src\Order\Application;

use Src\Order\Domain\Order;
use Src\Order\Domain\OrderRepositoryInterface;
use Src\Shared\Domain\Interfaces\ServiceInterface;
use Src\Shared\Domain\ValueObjects\NumInteger;
use Src\Shared\Domain\ValueObjects\Text;

class OrderCreator implements ServiceInterface
{

    private OrderRepositoryInterface $repository;

    public function __construct(OrderRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function handle(
        int $id_vendor,
        string $date_delivery
    ): Order {
        $OrderDTO = new Order(
            new NumInteger(0),
            new NumInteger($id_vendor),
            new NumInteger(0),
            new Text($date_delivery),
            new NumInteger(0)
        );

        return $this->repository->create($OrderDTO);
    }

}
