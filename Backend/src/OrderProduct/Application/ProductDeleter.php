<?php

namespace Src\OrderProduct\Application;

use Src\OrderProduct\Domain\OrderProductRepositoryInterface;
use Src\Shared\Domain\Interfaces\ServiceInterface;
use Src\Shared\Domain\ValueObjects\NumInteger;

class OrderProductDeleter implements ServiceInterface
{

    private OrderProductRepositoryInterface $repository;

    public function __construct(OrderProductRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @throws \Exception
     */
    public function handle(
        int $id
    ): bool {
        $idOrderProduct = new NumInteger($id);

        if ($this->repository->delete($idOrderProduct) === false) {
            throw new \Exception('No se pudo eliminar el OrderProducto');
        }

        return true;
    }

}
