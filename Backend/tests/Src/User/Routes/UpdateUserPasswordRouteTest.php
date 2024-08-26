<?php

namespace Tests\Src\User\Routes;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Src\TestCase;

class UpdateUserPasswordRouteTest extends TestCase
{
//    use RefreshDatabase;
    use WithFaker;

    public function test_put_update_a_user_route(): void {
        /*
         * Preparing
         */
        $testUser = [
            'id' => 1,
            'password'          => $this->faker->name,
        ];

        /*
         * Actions
         */
        $response = $this->json('PUT', 'api/user/change-password', [
            'id' => $testUser['id'],
            'password' => $testUser['password'],
            'password_confirmation' => $testUser['password'],
        ]);


        /*
         * Assert
         */
        $response->assertStatus(200);
    }
}
