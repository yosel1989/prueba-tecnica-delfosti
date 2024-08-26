<?php

namespace Tests\Src\User\Infrastructure;

use Src\User\Domain\User;
use Src\User\Domain\UserChangePassword;
use Src\User\Domain\UserRepositoryInterface;
use Src\Shared\Domain\ValueObjects\NumInteger;

class UserRepositoryFake implements UserRepositoryInterface
{
    public bool $callMethodCreate = false;
    public bool $callMethodUpdate = false;
    public bool $callMethodUpdatePassword = false;
    public bool $callMethodDelete = false;
    public bool $callMethodList = false;


    public function create(User $User): void
    {
        $this->callMethodCreate = true;
    }

    public function update(User $User): void
    {
        $this->callMethodUpdate = true;
    }

    public function delete(NumInteger $idUser): void
    {
        $this->callMethodDelete = true;
    }

    public function list(): array
    {
        $this->callMethodList = true;
        return array();
    }

    public function updatePassword(UserChangePassword $model): void
    {
        $this->callMethodUpdatePassword = true;
    }
}
