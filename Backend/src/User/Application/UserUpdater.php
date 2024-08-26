<?php

namespace Src\User\Application;

use Src\Shared\Domain\ValueObjects\GeneratorCode;
use Src\Shared\Domain\ValueObjects\HashPassword;
use Src\User\Domain\User;
use Src\User\Domain\UserRepositoryInterface;
use Src\Shared\Domain\Interfaces\ServiceInterface;
use Src\Shared\Domain\ValueObjects\NumFloat;
use Src\Shared\Domain\ValueObjects\NumInteger;
use Src\Shared\Domain\ValueObjects\Text;

class UserUpdater implements ServiceInterface
{

    private UserRepositoryInterface $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function handle(
        int $id,
        string $name,
        string $lastname,
        string $email,
        string $phone,
        string $username,
        string $password,
        int $id_position,
        int $id_rol,
    ): User {
        $User = new User(
            new NumInteger($id),
            new Text((new GeneratorCode(14))->value()),
            new Text($name),
            new Text($lastname),
            new Text($email),
            new Text($phone),
            new Text($username),
            new Text((new HashPassword($password))->value()),
            new NumInteger($id_position),
            new NumInteger($id_rol),
        );

        $this->repository->update($User);

        return $User;
    }

}
