<?php

namespace Src\User\Domain;

use Src\Shared\Domain\ValueObjects\NumInteger;
use Src\Shared\Domain\ValueObjects\Text;

interface UserRepositoryInterface
{
    /**
     * @param User $User
     *
     */
    public function create(User $User): void;

    /**
     * @param User $User
     */
    public function update(User $User): void;

    /**
     * @param NumInteger $idUser
     */
    public function delete(NumInteger $idUser): void;

    /**
     * @return array
     */
    public function list(): array;


    /**
     * @param UserChangePassword $model
     */
    public function updatePassword(UserChangePassword $model): void;


    /**
     * @param Text $username
     * @param Text $password
     * @return User
     */
    public function login(Text $username, Text $password): User;


    /**
     * @param Text $token
     * @return User
     */
    public function validateToken(Text $token): bool;

}
