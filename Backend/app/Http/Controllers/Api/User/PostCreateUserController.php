<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateUserRequest;
use Illuminate\Support\Facades\DB;
use Src\User\Application\UserCreator;

class PostCreateUserController extends Controller
{
    /**
     * Create new User
     *
     * @param CreateUserRequest $request
     * @param UserCreator $service
     * @return \Illuminate\Container\Container|mixed|object
     * @throws \Throwable
     */
    public function __invoke(CreateUserRequest $request, UserCreator $service)
    {
        DB::beginTransaction();
        try {
            $user = $service->handle(
                $request->name,
                $request->lastname,
                $request->email,
                $request->phone,
                $request->username,
                $request->password,
                $request->id_position,
                $request->id_rol
            );
            DB::commit();
            return response($user->toArrayWithZeroIdAndWithoutRelation(), 201);
        } catch (\Throwable $error) {
            DB::rollBack();
            throw $error;
        }
    }
}
