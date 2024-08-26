<?php

namespace Tests\Src\User\Routes;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Src\TestCase;

class DeleteUserRouteTest extends TestCase
{
//    use RefreshDatabase;
    use WithFaker;

    public function test_delete_a_User_route(): void {
        /*
         * Preparing
         */
        $testIdUser = 1;

        /*
         * Actions
         */
        $response = $this->json('DELETE', "api/user/{$testIdUser}");


        /*
         * Assert
         */
        $response->assertStatus(200);
    }
}
