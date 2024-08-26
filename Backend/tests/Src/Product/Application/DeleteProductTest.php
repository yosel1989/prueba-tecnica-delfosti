<?php

namespace Tests\Src\Product\Application;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Src\Product\Application\ProductDeleter;
use Src\Product\Application\ProductUpdater;
use Src\Product\Domain\Product;
use Tests\Src\Product\Infrastructure\ProductRepositoryFake;
use Tests\Src\TestCase;

class DeleteProductTest extends TestCase
{
//    use RefreshDatabase;
    use WithFaker;


    public function test_delete_a_product(): void {
        /*
         * Preparing
         */
        $testIdProduct = 1;

        /*
         * Actions
         */
        $fakeRepository = new ProductRepositoryFake();
        $creator = new ProductDeleter($fakeRepository);
        $result = $creator->handle($testIdProduct);

        /*
         * Assert
         */
        $this->assertTrue($result);
        $this->assertTrue($fakeRepository->callMethodDelete);
    }
}
