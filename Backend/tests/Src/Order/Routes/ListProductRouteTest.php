<?php

namespace Tests\Src\Order\Routes;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Src\TestCase;

class ListOrderRouteTest extends TestCase
{
    use WithFaker;

    public function test_list_Orders_route(): void {
        /*
         * Preparing
         */
        $testIdOrder = 1;

        /*
         * Actions
         */
        $response = $this->json('GET', "api/Orders");


        /*
         * Assert
         */
        $response->assertStatus(200);
    }
}
