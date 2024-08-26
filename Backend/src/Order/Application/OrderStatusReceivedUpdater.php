<?php

namespace Src\Order\Application;

use Src\Order\Domain\OrderRepositoryInterface;
use Src\Shared\Domain\Interfaces\ServiceInterface;
use Src\Shared\Domain\ValueObjects\NumInteger;

class OrderStatusReceivedUpdater implements ServiceInterface
{

    private OrderRepositoryInterface $repository;

    public function __construct(OrderRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function handle(
        int $id_order
    ): void {
            $orderId = new NumInteger($id_order);
            $this->repository->updateStatusReceived($orderId);
    }

}
