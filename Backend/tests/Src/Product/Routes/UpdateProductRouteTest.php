<?php

namespace Tests\Src\Product\Routes;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Src\TestCase;

class UpdateProductRouteTest extends TestCase
{
    use WithFaker;

    public function test_put_update_a_product_route(): void {
        /*
         * Preparing
         */
        $testProduct = [
            'id' => 1,
            'sku' => 'DD1211',
            'name' => $this->faker->name,
            'type_product_id' => $this->faker->numberBetween(1, 3),
            'tags' => 'limpieza,detergente',
            'price' => $this->faker->randomFloat(1,1, 999999),
            'unit_measurement_id' => $this->faker->numberBetween(1, 3),
            'stock' => $this->faker->randomDigit,
        ];

        /*
         * Actions
         */
        $response = $this->json('PUT', 'api/product', [
            'id' => $testProduct['id'],
            'sku' => $testProduct['sku'],
            'name' => $testProduct['name'],
            'type_product_id' => $testProduct['type_product_id'],
            'tags' => $testProduct['tags'],
            'price' => $testProduct['price'],
            'unit_measurement_id' => $testProduct['unit_measurement_id'],
            'stock' => $testProduct['stock'],
        ]);


        /*
         * Assert
         */
        $response->assertStatus(200)
                    ->assertJsonFragment($testProduct);
    }
}
