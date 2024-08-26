<?php

namespace Tests\Src\Product\Application;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Src\Product\Application\ProductLister;
use Src\Product\Domain\ProductList;
use Tests\Src\Product\Infrastructure\ProductRepositoryFake;
use Tests\Src\TestCase;

class ListProductTest extends TestCase
{
//    use RefreshDatabase;


    public function test_list_all_products(): void
    {
        /*
         * Preparing
         */


        /*
         * Actions
         */
        $fakeRepository = new ProductRepositoryFake();
        $lister = new ProductLister($fakeRepository);
        $result = $lister->handle();

        /*
         * Assert
         */
        $this->assertInstanceOf(ProductList::class, $result);
    }
}
