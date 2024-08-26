<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateProductRequest;
use Illuminate\Support\Facades\DB;
use Src\Product\Application\ProductCreator;
use Src\Product\Application\ProductUpdater;

class PutUpdateProductController extends Controller
{
    /**
     * Create new product
     *
     * @param UpdateProductRequest $request
     * @param ProductCreator $service
     */
    public function __invoke(UpdateProductRequest $request, ProductUpdater $service)
    {
        DB::beginTransaction();
        try {
            $product = $service->handle(
                $request->id,
                $request->sku,
                $request->name,
                $request->type_product_id,
                $request->tags,
                $request->price,
                $request->unit_measurement_id,
                $request->stock
            );
            DB::commit();
            return response($product->toArray(), 200);
        } catch (\Throwable $error) {
            DB::rollBack();
            throw $error;
        }
    }
}
