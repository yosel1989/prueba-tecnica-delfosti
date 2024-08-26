<?php

namespace Src\User\Application;

use Src\User\Domain\User;
use Src\User\Domain\UserList;
use Src\User\Domain\UserRepositoryInterface;
use Src\Shared\Domain\Interfaces\ServiceInterface;
use Src\Shared\Domain\ValueObjects\NumInteger;
use Src\Shared\Domain\ValueObjects\Text;

class UserLister implements ServiceInterface
{

    private UserRepositoryInterface $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @throws \Exception
     */
    public function handle(): UserList
    {
        $list = new UserList();
        foreach ($this->repository->list() as $item) {
            $user = new User(
                new NumInteger($item['id']),
                new Text($item['code']),
                new Text($item['name']),
                new Text($item['lastname']),
                new Text($item['email']),
                new Text($item['phone']),
                new Text($item['username']),
                new Text(''),
                new NumInteger($item['id_position']),
                new NumInteger($item['id_rol']),
            );
            $user->setPosition(new Text($item['position']['name']));
            $user->setRol(new Text($item['rol']['name']));
            $list->add($user);
        }
        return $list;
    }

}
