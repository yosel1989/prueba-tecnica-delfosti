<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\CreateOrderRequest;
use App\Http\Requests\Order\OrderStatusInDeliveryRequest;
use Illuminate\Support\Facades\DB;
use Src\Order\Application\OrderCreator;
use Src\Order\Application\OrderStatusInDeliveryUpdater;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class PutChangeStatusDeliveryOrderController extends Controller
{
    /**
     * Create new product
     *
     * @param OrderStatusInDeliveryRequest $request
     * @param OrderStatusInDeliveryUpdater $service
     * @return \Illuminate\Container\Container|mixed|object
     * @throws \Throwable
     */
    public function __invoke(OrderStatusInDeliveryRequest $request, OrderStatusInDeliveryUpdater $service)
    {
        DB::beginTransaction();
        try {
            $service->handle(
                $request->id
            );

            DB::commit();
            return response([
                'data'      => null,
                'error'     => null,
                'status'    => ResponseAlias::HTTP_OK
            ], 200);
        } catch (\Exception $error) {
            DB::rollBack();
            return response([
                'data'      => null,
                'error'     => $error->getMessage(),
                'status'    => ResponseAlias::HTTP_BAD_REQUEST
            ], 400);
        }
    }
}
