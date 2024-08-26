<?php

namespace Tests\Src\User\Routes;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Src\TestCase;

class UpdateUserRouteTest extends TestCase
{
    use WithFaker;

    public function test_put_update_a_user_route(): void {
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
        $response = $this->json('PUT', 'api/user', [
            'id' => $testUser['id'],
            'name' => $testUser['name'],
            'lastname' => $testUser['lastname'],
            'email' => $testUser['email'],
            'phone' => $testUser['phone'],
            'id_position' => $testUser['id_position'],
            'id_rol' => $testUser['id_rol'],
        ]);


        /*
         * Assert
         */
        $response->assertStatus(200);
    }
}
