<?php

namespace Src\User\Application;

use Src\Shared\Domain\ValueObjects\HashPassword;
use Src\User\Domain\UserChangePassword;
use Src\User\Domain\UserRepositoryInterface;
use Src\Shared\Domain\Interfaces\ServiceInterface;
use Src\Shared\Domain\ValueObjects\NumInteger;
use Src\Shared\Domain\ValueObjects\Text;

class UserPasswordUpdater implements ServiceInterface
{

    private UserRepositoryInterface $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function handle(
        int $id,
        string $password,
        string $passwordConfirmation,
    ): void {
        $UserChangePassword = new UserChangePassword(
            new NumInteger($id),
            new Text((new HashPassword($password))->value()),
            new Text((new HashPassword($passwordConfirmation))->value()),
        );

        $this->repository->updatePassword($UserChangePassword);
    }

}
