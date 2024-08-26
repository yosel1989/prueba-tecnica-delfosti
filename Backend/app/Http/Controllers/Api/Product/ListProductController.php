<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductListResource;
use Illuminate\Foundation\Http\FormRequest;
use Src\Product\Application\ProductLister;

class ListProductController extends Controller
{


    /**
     * @param FormRequest $request
     * @param ProductLister $service
     * @return \Illuminate\Container\Container|mixed|object
     * @throws \Throwable
     */
    public function __invoke(FormRequest $request, ProductLister $service)
    {
        try {
            $products = $service->handle();
//            dd($products->all());
            return response(ProductListResource::collection($products->all()), 200);
        } catch (\Throwable $error) {
            throw $error;
        }
    }
}
