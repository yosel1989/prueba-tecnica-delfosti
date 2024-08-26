<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ValidateTokenRequest;
use App\Http\Resources\Auth\UserLoginResource;
use Illuminate\Support\Facades\DB;
use Src\User\Application\UserTokenValidator;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class PostValidateTokenController extends Controller
{
    /**
     * Create new product
     *
     * @param ValidateTokenRequest $request
     * @param UserTokenValidator $service
     * @return \Illuminate\Container\Container|mixed|object
     */
    public function __invoke(ValidateTokenRequest $request, UserTokenValidator $service)
    {
        DB::beginTransaction();
        try {
            $validate = $service->handle(
                $request->token
            );
            DB::commit();
            return response(
                [
                    'data'      => $validate ? 'Token válido' : 'Token inválido',
                    'error'     => null,
                    'status'    => $validate ? ResponseAlias::HTTP_ACCEPTED : ResponseAlias::HTTP_BAD_REQUEST
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
