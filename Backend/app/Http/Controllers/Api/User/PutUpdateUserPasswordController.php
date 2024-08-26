<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateUserPasswordRequest;
use Illuminate\Support\Facades\DB;
use Src\User\Application\UserPasswordUpdater;

class PutUpdateUserPasswordController extends Controller
{
    /**
     * Create new User
     *
     * @param UpdateUserPasswordRequest $request
     * @param UserPasswordUpdater $service
     * @return \Illuminate\Container\Container|mixed|object
     * @throws \Throwable
     */
    public function __invoke(UpdateUserPasswordRequest $request, UserPasswordUpdater $service)
    {
        DB::beginTransaction();
        try {
            $service->handle(
                $request->id,
                $request->password,
                $request->password_confirmation,
            );
            DB::commit();
            return response(true, 200);
        } catch (\Throwable $error) {
            DB::rollBack();
            throw $error;
        }
    }
}
