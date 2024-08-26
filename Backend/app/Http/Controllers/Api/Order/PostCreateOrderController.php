<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\CreateOrderRequest;
use App\Http\Resources\Order\CreateOrderResource;
use Illuminate\Support\Facades\DB;
use Src\Order\Application\OrderCreator;
use Src\OrderProduct\Application\OrderProductCreator;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class PostCreateOrderController extends Controller
{
    /**
     * Create new product
     *
     * @param CreateOrderRequest $request
     * @param OrderCreator $service
     * @param OrderProductCreator $serviceDetail
     * @return \Illuminate\Container\Container|mixed|object
     */
    public function __invoke(CreateOrderRequest $request, OrderCreator $service, OrderProductCreator $serviceDetail)
    {
        DB::beginTransaction();
        try {
            $order = $service->handle(
                $request->id_vendor,
                $request->date_delivery,
            );

            foreach ($request->detail as $detail) {
                $detail = $serviceDetail->handle(
                    $order->getId()->value(),
                    $detail['id_product'],
                    $detail['quantity'],
                    $detail['price']
                );
                $order->getDetail()->add($detail);
            }


            DB::commit();
            return response([
                'data' => CreateOrderResource::make($order),
                'error' => null,
                'status' => ResponseAlias::HTTP_CREATED
            ], 201);
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
