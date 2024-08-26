<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductListResource;
use Illuminate\Foundation\Http\FormRequest;
use Src\Product\Application\ProductLister;
use Symfony\Component\HttpFoundation\Response;

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
            return response([
                'data'   => ProductListResource::collection($products->all()),
                'error'  => null,
                'status' => Response::HTTP_OK

            ], 200);
        } catch (\Exception $error) {
            return response([
                'data'   => null,
                'error'  => $error->getMessage(),
                'status' => Response::HTTP_BAD_REQUEST

            ], 400);
        }
    }
}
