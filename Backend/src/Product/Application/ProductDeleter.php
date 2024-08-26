<?php

namespace Src\Product\Application;

use Src\Product\Domain\ProductRepostioryInterface;
use Src\Shared\Domain\Interfaces\ServiceInterface;
use Src\Shared\Domain\ValueObjects\NumInteger;

class ProductDeleter implements ServiceInterface
{

    private ProductRepostioryInterface $repository;

    public function __construct(ProductRepostioryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @throws \Exception
     */
    public function handle(
        int $id
    ): bool {
        $idProduct = new NumInteger($id);

        if ($this->repository->delete($idProduct) === false) {
            throw new \Exception('No se pudo eliminar el producto');
        }

        return true;
    }

}
