<?php

namespace Tests\Src\Product\Routes;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Src\TestCase;

class DeleteProductRouteTest extends TestCase
{
    use WithFaker;

    public function test_delete_a_product_route(): void {
        /*
         * Preparing
         */
        $testIdProduct = 1;

        /*
         * Actions
         */
        $response = $this->json('DELETE', "api/product/{$testIdProduct}");


        /*
         * Assert
         */
        $response->assertStatus(200);
    }
}
