<?php

namespace Tests\Src\Product\Routes;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Src\TestCase;

class CreateNewProductRouteTest extends TestCase
{
    use WithFaker;

    public function test_post_create_a_new_product_route(): void
    {
        /*
         * Preparing
         */
        $testProduct = [
            'id' => 0,
            'sku' => 'SK-' . (new \DateTime('now'))->format('mdHms'),
            'name' => 'Producto ' . (new \DateTime('now'))->format('mdHms'),
            'type_product_id' => $this->faker->numberBetween(1, 3),
            'tags' => 'limpieza,detergente',
            'price' => $this->faker->randomFloat(2, 10, 90),
            'unit_measurement_id' => $this->faker->numberBetween(1, 3),
            'stock' => $this->faker->randomDigitNotNull,
        ];

        /*
         * Actions
         */
        $response = $this->json('POST', 'api/product', [
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
        $response->assertStatus(201)
                    ->assertJsonFragment($testProduct);
    }
}
