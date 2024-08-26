<?php

namespace Src\OrderProduct\Domain;

use Src\Shared\Domain\ValueObjects\NumInteger;

interface OrderProductRepositoryInterface
{
    /**
     * @param OrderProduct $OrderProduct
     *
     */
    public function create(OrderProduct $OrderProduct): void;

    /**
     * @param OrderProduct $OrderProduct
     */
    public function update(OrderProduct $OrderProduct): void;

    /**
     * @param NumInteger $idOrderProduct
     */
    public function delete(NumInteger $idOrderProduct): void;

    /**
     * @return array
     */
    public function list(): array;

}
