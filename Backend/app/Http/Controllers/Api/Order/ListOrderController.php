<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\DeleteUserRequest;
use App\Http\Resources\Order\OrderListResource;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response as ResponseAlias;
use Illuminate\Support\Facades\DB;
use Src\Order\Application\OrderLister;

class ListOrderController extends Controller
{


    /**
     * @param DeleteUserRequest $request
     * @param OrderLister $service
     * @return \Illuminate\Container\Container|mixed|object
     */
    public function __invoke(FormRequest $request, OrderLister $service)
    {
        DB::beginTransaction();
        try {
            $orders = $service->handle();
            DB::commit();
            return response([
                'data' => OrderListResource::collection($orders->all()),
                'error' => null,
                'status' => ResponseAlias::HTTP_OK
            ], 200);
        } catch (\Exception $error) {
            DB::rollBack();
            return response([
                'data' => null,
                'error' => $error->getMessage(),
                'status' => ResponseAlias::HTTP_BAD_REQUEST
            ], 400);
        }
    }
}
