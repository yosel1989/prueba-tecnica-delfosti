<?php

namespace Tests\Src\User\Routes;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Src\TestCase;

class CreateNewUserRouteTest extends TestCase
{
    use WithFaker;

    public function test_post_create_a_new_user_route(): void
    {
        /*
         * Preparing
         */
        $testUser = [
            'id' => 0,
            'name' => $this->faker->name,
            'lastname' => $this->faker->lastName,
            'email' => $this->faker->unique()->email,
            'phone' => $this->faker->unique()->e164PhoneNumber,
            'username' => $this->faker->unique()->userName,
            'password' => $this->faker->password,
            'id_position' => $this->faker->numberBetween(1, 3),
            'id_rol' => $this->faker->numberBetween(1, 3),
        ];

        /*
         * Actions
         */
        $response = $this->json('POST', 'api/user', [
            'name' => $testUser['name'],
            'lastname' => $testUser['lastname'],
            'email' => $testUser['email'],
            'phone' => $testUser['phone'],
            'username' => $testUser['username'],
            'password' => $testUser['password'],
            'id_position' => $testUser['id_position'],
            'id_rol' => $testUser['id_rol'],
        ]);

        /*
         * Assert
         */
        $response->assertStatus(201);
    }
}
