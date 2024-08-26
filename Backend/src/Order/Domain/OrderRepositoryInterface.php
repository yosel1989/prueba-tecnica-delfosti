<?php

namespace Src\Order\Domain;

use Src\Shared\Domain\ValueObjects\NumInteger;

interface OrderRepositoryInterface
{
    /**
     * @param Order $Order
     *
     */
    public function create(Order $Order): Order;


    /**
     * @return array
     */
    public function list(): array;

    /**
     * @param NumInteger $idOrder
     */
    public function updateStatusProgress(NumInteger $idOrder): void;

    /**
     * @param NumInteger $idOrder
     */
    public function updateStatusDelivery(NumInteger $idOrder): void;

    /**
     * @param NumInteger $idOrder
     */
    public function updateStatusReceived(NumInteger $idOrder): void;

}
