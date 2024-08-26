<?php

namespace Tests\Src\User\Application;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Src\User\Application\UserLister;
use Src\User\Domain\UserList;
use Tests\Src\User\Infrastructure\UserRepositoryFake;
use Tests\Src\TestCase;

class ListUserTest extends TestCase
{
    use RefreshDatabase;


    public function test_list_all_Users(): void
    {
        /*
         * Preparing
         */


        /*
         * Actions
         */
        $fakeRepository = new UserRepositoryFake();
        $lister = new UserLister($fakeRepository);
        $result = $lister->handle();

        /*
         * Assert
         */
        $this->assertInstanceOf(UserList::class, $result);
    }
}
