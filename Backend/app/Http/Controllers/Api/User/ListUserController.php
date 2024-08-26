<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\DeleteUserRequest;
use Illuminate\Foundation\Http\FormRequest;
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
            return response($Users->all(), 200);
        } catch (\Throwable $error) {
            DB::rollBack();
            throw $error;
        }
    }
}
