<?php

namespace Tests\Src\Product\Application;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Src\Product\Application\ProductUpdater;
use Src\Product\Domain\Product;
use Tests\Src\Product\Infrastructure\ProductRepositoryFake;
use Tests\Src\TestCase;

class UpdateProductTest extends TestCase
{
//    use RefreshDatabase;
    use WithFaker;


    public function test_update_a_product(): void{
        /*
         * Preparing
         */
        $testProduct = [
            'id' => 1,
            'sku' => 'DD1211',
            'name' => $this->faker->name,
            'type_product_id' => $this->faker->numberBetween(1, 3),
            'tags' => 'limpieza,detergente',
            'price' => $this->faker->randomFloat(2),
            'unit_measurement_id' => $this->faker->numberBetween(1, 3),
            'stock' => $this->faker->randomDigit,
        ];

        /*
         * Actions
         */
        $fakeRepository = new ProductRepositoryFake();
        $creator = new ProductUpdater($fakeRepository);
        $product = $creator->handle(
            $testProduct['id'],
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
        $this->assertEquals($testProduct, $product->toArray());
        $this->assertTrue($fakeRepository->callMethodUpdate);
    }
}
