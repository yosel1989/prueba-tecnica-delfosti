<?php

namespace Tests\Src\User\Application;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Src\User\Application\UserCreator;
use Src\User\Domain\User;
use Tests\Src\User\Infrastructure\UserRepositoryFake;
use Tests\Src\TestCase;

class CreateNewUserTest extends TestCase
{
//    use RefreshDatabase;
    use WithFaker;


    public function test_create_a_new_user(): void
    {
        /*
         * Preparing
         */
        $testUser = [
            'id'            => 0,
            'name'          => $this->faker->name,
            'lastname'      => $this->faker->lastName,
            'email'         => $this->faker->unique()->email,
            'phone'         => $this->faker->unique()->e164PhoneNumber,
            'username'      => $this->faker->unique()->userName(),
            'password'      => $this->faker->password,
            'id_position'   => $this->faker->numberBetween(1, 3),
            'id_rol'        => $this->faker->numberBetween(1, 3),
        ];

        /*
         * Actions
         */
        $fakeRepository = new UserRepositoryFake();
        $creator = new UserCreator($fakeRepository);
        $user = $creator->handle(
            $testUser['name'],
            $testUser['lastname'],
            $testUser['email'],
            $testUser['phone'],
            $testUser['username'],
            $testUser['password'],
            $testUser['id_position'],
            $testUser['id_rol'],
        );

        /*
         * Assert
         */

        $this->assertInstanceOf(User::class, $user);
//        $this->assertEquals($testUser, $user->toArrayWithZeroId());
        $this->assertTrue($fakeRepository->callMethodCreate);
    }
}
