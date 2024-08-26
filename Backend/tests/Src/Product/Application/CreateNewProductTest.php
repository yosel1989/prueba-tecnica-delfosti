<?php

namespace Tests\Src\Product\Application;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Src\Product\Application\ProductCreator;
use Src\Product\Domain\Product;
use Tests\Src\Product\Infrastructure\ProductRepositoryFake;
use Tests\Src\TestCase;

class CreateNewProductTest extends TestCase
{
//    use RefreshDatabase;
    use WithFaker;


    public function test_create_a_new_product(): void{
        /*
         * Preparing
         */
        $testProduct = [
            'id' => 0,
            'sku' => 'SK-' . (new \DateTime('now'))->format('YmdHm'),
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
        $fakeRepository = new ProductRepositoryFake();
        $creator = new ProductCreator($fakeRepository);
        $product = $creator->handle(
            $testProduct['sku'],
            $testProduct['name'],
            $testProduct['type_product_id'],
            $testProduct['tags'],
            $testProduct['price'],
            $testProduct['unit_measurement_id'],
            $testProduct['stock']
        );

        /*
         * Assert
         */

        $this->assertInstanceOf(Product::class, $product);
        $this->assertEquals($testProduct, $product->toArrayWithZeroId());
        $this->assertTrue($fakeRepository->callMethodCreate);
    }
}
