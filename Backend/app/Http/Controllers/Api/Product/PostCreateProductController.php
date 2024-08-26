<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CreateProductRequest;
use Illuminate\Support\Facades\DB;
use Src\Product\Application\ProductCreator;

class PostCreateProductController extends Controller
{
    /**
     * Create new product
     *
     * @param CreateProductRequest $request
     * @param ProductCreator $service
     */
    public function __invoke(CreateProductRequest $request, ProductCreator $service)
    {
        DB::beginTransaction();
        try {
            $product = $service->handle(
                $request->sku,
                $request->name,
                $request->type_product_id,
                $request->tags,
                $request->price,
                $request->unit_measurement_id,
                $request->stock
            );
            DB::commit();
            return response($product->toArrayWithZeroId(), 201);
        } catch (\Throwable $error) {
            DB::rollBack();
            throw $error;
        }
    }
}
