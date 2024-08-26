<?php

namespace Tests\Src\User\Application;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Src\User\Application\UserPasswordUpdater;
use Tests\Src\User\Infrastructure\UserRepositoryFake;
use Tests\Src\TestCase;

class UpdateUserPasswordTest extends TestCase
{
//    use RefreshDatabase;
    use WithFaker;


    public function test_update_a_user(): void{
        /*
         * Preparing
         */
        $testUser = [
            'id'                        => 1,
            'password'                  => $this->faker->password
        ];

        /*
         * Actions
         */
        $fakeRepository = new UserRepositoryFake();
        $passwordUpdater = new UserPasswordUpdater($fakeRepository);
        $passwordUpdater->handle(
            $testUser['id'],
            $testUser['password'],
            $testUser['password']
        );

        /*
         * Assert
         */

//        $this->assertInstanceOf(User::class, $User);
//        $this->assertEquals($testUser, $User->toArrayWithZeroIdAndWithoutRelationUpdate());
        $this->assertTrue($fakeRepository->callMethodUpdatePassword);
    }
}
