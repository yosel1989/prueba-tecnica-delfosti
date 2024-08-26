<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\OrderStatusReceivedRequest;
use Illuminate\Support\Facades\DB;
use Src\Order\Application\OrderStatusReceivedUpdater;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class PutChangeStatusReceivedOrderController extends Controller
{
    /**
     * Create new product
     *
     * @param OrderStatusReceivedRequest $request
     * @param OrderStatusReceivedUpdater $service
     * @return \Illuminate\Container\Container|mixed|object
     * @throws \Throwable
     */
    public function __invoke(OrderStatusReceivedRequest $request, OrderStatusReceivedUpdater $service)
    {
        DB::beginTransaction();
        try {
            $service->handle(
                $request->id
            );

            DB::commit();
            return response([
                'data'      => null,
                'error'   => null,
                'status'    => ResponseAlias::HTTP_OK
            ], 200);
        } catch (\Exception $error) {
            DB::rollBack();
            return response([
                'data'      => null,
                'error'     => $error->getMessage(),
                'status'    => ResponseAlias::HTTP_OK
            ], 400);
        }
    }
}
