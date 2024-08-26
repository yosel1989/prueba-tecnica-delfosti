<?php

namespace Tests\Src\Order\Application;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Src\Order\Application\OrderLister;
use Src\Order\Domain\OrderList;
use Tests\Src\Order\Infrastructure\OrderRepositoryFake;
use Tests\Src\TestCase;

class ListOrderTest extends TestCase
{
//    use RefreshDatabase;


    public function test_list_all_Orders(): void
    {
        /*
         * Preparing
         */


        /*
         * Actions
         */
        $fakeRepository = new OrderRepositoryFake();
        $lister = new OrderLister($fakeRepository);
        $result = $lister->handle();

        /*
         * Assert
         */
        $this->assertInstanceOf(OrderList::class, $result);
    }
}
