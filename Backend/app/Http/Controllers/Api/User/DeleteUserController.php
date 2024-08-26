<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\DeleteUserRequest;
use Illuminate\Support\Facades\DB;
use Src\User\Application\UserDeleter;

class DeleteUserController extends Controller
{

    /**
     * @param DeleteUserRequest $request
     * @param UserDeleter $service
     * @return \Illuminate\Container\Container|mixed|object
     * @throws \Throwable
     */
    public function __invoke(DeleteUserRequest $request, UserDeleter $service)
    {
        DB::beginTransaction();
        try {
            $User = $service->handle(
                $request->id
            );
            DB::commit();
            return response($User, 200);
        } catch (\Throwable $error) {
            DB::rollBack();
            throw $error;
        }
    }
}
