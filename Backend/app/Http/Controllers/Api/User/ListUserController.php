<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\DeleteUserRequest;
use App\Http\Resources\User\UserResource;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response as ResponseAlias;
use Illuminate\Support\Facades\DB;
use Src\User\Application\UserLister;

class ListUserController extends Controller
{


    /**
     * @param DeleteUserRequest $request
     * @param UserLister $service
     * @return \Illuminate\Container\Container|mixed|object
     * @throws \Throwable
     */
    public function __invoke(FormRequest $request, UserLister $service)
    {
        DB::beginTransaction();
        try {
            $Users = $service->handle();
            DB::commit();
            return response([
                'data' => UserResource::collection($Users->all()),
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
