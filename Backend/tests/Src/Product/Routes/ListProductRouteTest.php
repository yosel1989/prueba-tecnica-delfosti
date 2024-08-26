<?php

namespace Tests\Src\Product\Routes;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Src\TestCase;

class ListProductRouteTest extends TestCase
{
    use WithFaker;

    public function test_list_products_route(): void {
        /*
         * Preparing
         */
        $testIdProduct = 1;

        /*
         * Actions
         */
        $response = $this->json('GET', "api/products");


        /*
         * Assert
         */
        $response->assertStatus(200);
    }
}
