<?php

namespace Tests\Src\Order\Routes;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Src\TestCase;

class CreateNewOrderRouteTest extends TestCase
{
    use WithFaker;

    public function test_post_create_a_new_order_route(): void
    {
        /*
         * Preparing
         */
        $testOrder = [
            'id'            => 0,
            'id_vendor'     => 1,
            'date_delivery' => '2024-08-25',
            'detail'        => array(
                [
                    'id_product'    => 1,
                    'quantity'      => 2,
                    'price'         => 500.00
                ],
                [
                    'id_product'    => 1,
                    'quantity'      => 2,
                    'price'         => 700.00
                ]
            )
        ];

        /*
         * Actions
         */
        $response = $this->json('POST', 'api/order', [
            'id'            => $testOrder['id'],
            'id_vendor'     => $testOrder['id_vendor'],
            'date_delivery' => $testOrder['date_delivery'],
            'detail'        => $testOrder['detail'],
        ]);

        /*
         * Assert
         */
        $response->assertStatus(201);
    }
}
