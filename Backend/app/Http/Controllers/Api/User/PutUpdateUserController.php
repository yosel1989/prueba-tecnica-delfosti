<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateUserRequest;
use Illuminate\Support\Facades\DB;
use Src\User\Application\UserCreator;

class PutUpdateUserController extends Controller
{
    /**
     * Create new User
     *
     * @param UpdateUserRequest $request
     * @param UserCreator $service
     * @return \Illuminate\Container\Container|mixed|object
     * @throws \Throwable
     */
    public function __invoke(UpdateUserRequest $request, UserCreator $service)
    {
        DB::beginTransaction();
        try {
            $user = $service->handle(
                $request->name,
                $request->lastname,
                $request->email,
                $request->phone,
                '',
                '',
                $request->id_position,
                $request->id_rol
            );
            DB::commit();
            return response($user->toArrayWithZeroIdAndWithoutRelation(), 200);
        } catch (\Throwable $error) {
            DB::rollBack();
            throw $error;
        }
    }
}
