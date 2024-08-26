<?php

namespace Src\User\Application;

use Src\User\Domain\User;
use Src\User\Domain\UserRepositoryInterface;
use Src\Shared\Domain\Interfaces\ServiceInterface;
use Src\Shared\Domain\ValueObjects\Text;

class UserTokenValidator implements ServiceInterface
{

    private UserRepositoryInterface $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function handle(
        string $token
    ): bool {
        $_token = new Text($token);
        return $this->repository->validateToken($_token);
    }

}
