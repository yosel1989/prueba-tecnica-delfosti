<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\Auth\UserLoginResource;
use Illuminate\Support\Facades\DB;
use Src\User\Application\UserLoger;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class PostLoginController extends Controller
{
    /**
     * Create new product
     *
     * @param LoginRequest $request
     * @param UserLoger $service
     * @return \Illuminate\Container\Container|mixed|object
     * @throws \Throwable
     */
    public function __invoke(LoginRequest $request, UserLoger $service)
    {
        DB::beginTransaction();
        try {
            $user = $service->handle(
                $request->username,
                $request->password
            );
            DB::commit();
            return response(
                [
                    'data'      => UserLoginResource::make($user),
                    'error'     => null,
                    'status'    => ResponseAlias::HTTP_OK
                ],
                200
            );
        } catch (\Exception $error) {
            DB::rollBack();
            return response(
                [
                    'data'      => null,
                    'error'     => $error->getMessage(),
                    'status'    => ResponseAlias::HTTP_BAD_REQUEST
                ],
                400
            );
        }
    }
}
