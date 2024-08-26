<?php

namespace Tests\Src\User\Application;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Src\User\Application\UserUpdater;
use Src\User\Domain\User;
use Tests\Src\User\Infrastructure\UserRepositoryFake;
use Tests\Src\TestCase;

class UpdateUserTest extends TestCase
{
//    use RefreshDatabase;
    use WithFaker;


    public function test_update_a_user(): void{
        /*
         * Preparing
         */
        $testUser = [
            'id' => 1,
            'name'          => $this->faker->name,
            'lastname'      => $this->faker->lastName,
            'email'         => $this->faker->unique()->email,
            'phone'         => $this->faker->unique()->e164PhoneNumber,
            'id_position'   => $this->faker->numberBetween(1, 3),
            'id_rol'        => $this->faker->numberBetween(1, 3),
        ];

        /*
         * Actions
         */
        $fakeRepository = new UserRepositoryFake();
        $creator = new UserUpdater($fakeRepository);
        $User = $creator->handle(
            $testUser['id'],
            $testUser['name'],
            $testUser['lastname'],
            $testUser['email'],
            $testUser['phone'],
            '',
            '',
            $testUser['id_position'],
            $testUser['id_rol'],
        );

        /*
         * Assert
         */

        $this->assertInstanceOf(User::class, $User);
        $this->assertEquals($testUser, $User->toArrayWithZeroIdAndWithoutRelationUpdate());
        $this->assertTrue($fakeRepository->callMethodUpdate);
    }
}
