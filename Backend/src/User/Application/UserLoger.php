<?php

namespace Src\User\Application;

use Src\User\Domain\User;
use Src\User\Domain\UserRepositoryInterface;
use Src\Shared\Domain\Interfaces\ServiceInterface;
use Src\Shared\Domain\ValueObjects\Text;

class UserLoger implements ServiceInterface
{

    private UserRepositoryInterface $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function handle(
        string $username,
        string $password
    ): User {
        $_username = new Text($username);
        $_password = new Text($password);

        return $this->repository->login($_username, $_password);
    }

}
