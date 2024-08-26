<?php

namespace Src\User\Application;

use Src\User\Domain\UserRepositoryInterface;
use Src\Shared\Domain\Interfaces\ServiceInterface;
use Src\Shared\Domain\ValueObjects\NumInteger;

class UserDeleter implements ServiceInterface
{

    private UserRepositoryInterface $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @throws \Exception
     */
    public function handle(
        int $id
    ): bool {
        $idUser = new NumInteger($id);

        if ($this->repository->delete($idUser) === false) {
            throw new \Exception('No se pudo eliminar el usuario');
        }

        return true;
    }

}
