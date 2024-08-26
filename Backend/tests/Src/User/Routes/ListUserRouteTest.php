<?php

namespace Tests\Src\User\Routes;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Src\TestCase;

class ListUserRouteTest extends TestCase
{
    use WithFaker;

    public function test_list_Users_route(): void {
        /*
         * Preparing
         */
        $testIdUser = 1;

        /*
         * Actions
         */
        $response = $this->json('GET', "api/users");


        /*
         * Assert
         */
        $response->assertStatus(200);
    }
}
