<?php

namespace Tests\Src\Order\Application;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Src\Order\Application\OrderCreator;
use Src\Order\Domain\Order;
use Tests\Src\Order\Infrastructure\OrderRepositoryFake;
use Tests\Src\TestCase;

class CreateNewOrderTest extends TestCase
{
//    use RefreshDatabase;
    use WithFaker;


    public function test_create_a_new_Order(): void{
        /*
         * Preparing
         */
        $testOrder = [
            'id' => 0,
            'sku' => 'SK-' . (new \DateTime('now'))->format('YmdHm'),
            'name' => 'Ordero ' . (new \DateTime('now'))->format('mdHms'),
            'type_Order_id' => $this->faker->numberBetween(1, 3),
            'tags' => 'limpieza,detergente',
            'price' => $this->faker->randomFloat(2, 10, 90),
            'unit_measurement_id' => $this->faker->numberBetween(1, 3),
            'stock' => $this->faker->randomDigitNotNull,
        ];

        /*
         * Actions
         */
        $fakeRepository = new OrderRepositoryFake();
        $creator = new OrderCreator($fakeRepository);
        $Order = $creator->handle(
            $testOrder['sku'],
            $testOrder['name'],
            $testOrder['type_Order_id'],
            $testOrder['tags'],
            $testOrder['price'],
            $testOrder['unit_measurement_id'],
            $testOrder['stock']
        );

        /*
         * Assert
         */

        $this->assertInstanceOf(Order::class, $Order);
        $this->assertEquals($testOrder, $Order->toArrayWithZeroId());
        $this->assertTrue($fakeRepository->callMethodCreate);
    }
}
