<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\DeleteUserRequest;
use Illuminate\Support\Facades\DB;
use Src\Product\Application\ProductDeleter;

class DeleteProductController extends Controller
{

    /**
     * @param DeleteUserRequest $request
     * @param ProductDeleter $service
     * @return \Illuminate\Container\Container|mixed|object
     * @throws \Throwable
     */
    public function __invoke(DeleteUserRequest $request, ProductDeleter $service)
    {
        DB::beginTransaction();
        try {
            $product = $service->handle(
                $request->id
            );
            DB::commit();
            return response($product, 200);
        } catch (\Throwable $error) {
            DB::rollBack();
            throw $error;
        }
    }
}
