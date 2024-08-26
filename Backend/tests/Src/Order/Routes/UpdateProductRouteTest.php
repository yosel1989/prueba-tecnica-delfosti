<?php

namespace Tests\Src\Order\Routes;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Src\TestCase;

class UpdateOrderRouteTest extends TestCase
{
    use WithFaker;

    public function test_put_update_a_Order_route(): void {
        /*
         * Preparing
         */
        $testOrder = [
            'id' => 1,
            'sku' => 'DD1211',
            'name' => $this->faker->name,
            'type_Order_id' => $this->faker->numberBetween(1, 3),
            'tags' => 'limpieza,detergente',
            'price' => $this->faker->randomFloat(1,1, 999999),
            'unit_measurement_id' => $this->faker->numberBetween(1, 3),
            'stock' => $this->faker->randomDigit,
        ];

        /*
         * Actions
         */
        $response = $this->json('PUT', 'api/Order', [
            'id' => $testOrder['id'],
            'sku' => $testOrder['sku'],
            'name' => $testOrder['name'],
            'type_Order_id' => $testOrder['type_Order_id'],
            'tags' => $testOrder['tags'],
            'price' => $testOrder['price'],
            'unit_measurement_id' => $testOrder['unit_measurement_id'],
            'stock' => $testOrder['stock'],
        ]);


        /*
         * Assert
         */
        $response->assertStatus(200)
                    ->assertJsonFragment($testOrder);
    }
}
