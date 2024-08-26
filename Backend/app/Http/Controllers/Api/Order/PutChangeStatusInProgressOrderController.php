<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\OrderStatusInProgressRequest;
use Illuminate\Support\Facades\DB;
use Src\Order\Application\OrderStatusInProgressUpdater;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class PutChangeStatusInProgressOrderController extends Controller
{
    /**
     * Create new product
     *
     * @param OrderStatusInProgressRequest $request
     * @param OrderStatusInProgressUpdater $service
     * @return \Illuminate\Container\Container|mixed|object
     * @throws \Throwable
     */
    public function __invoke(OrderStatusInProgressRequest $request, OrderStatusInProgressUpdater $service)
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
            ], ResponseAlias::HTTP_OK);
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
