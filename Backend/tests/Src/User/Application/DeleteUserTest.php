<?php

namespace Tests\Src\User\Application;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Src\User\Application\UserDeleter;
use Src\User\Application\UserUpdater;
use Src\User\Domain\User;
use Tests\Src\User\Infrastructure\UserRepositoryFake;
use Tests\Src\TestCase;

class DeleteUserTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;


    public function test_delete_a_User(): void {
        /*
         * Preparing
         */
        $testIdUser = 1;

        /*
         * Actions
         */
        $fakeRepository = new UserRepositoryFake();
        $creator = new UserDeleter($fakeRepository);
        $result = $creator->handle($testIdUser);

        /*
         * Assert
         */
        $this->assertTrue($result);
        $this->assertTrue($fakeRepository->callMethodDelete);
    }
}
