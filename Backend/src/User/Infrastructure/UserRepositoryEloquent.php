<?php

namespace Src\User\Infrastructure;

use App\Models\User as ModelsUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;
use Src\Shared\Domain\ValueObjects\Text;
use Src\User\Domain\User;
use Src\User\Domain\UserChangePassword;
use Src\User\Domain\UserRepositoryInterface;
use Src\Shared\Domain\ValueObjects\NumInteger;

class UserRepositoryEloquent implements UserRepositoryInterface
{

    public function create(User $User): void
    {
        ModelsUser::create([
            'code'                  => $User->getCode()->value(),
            'name'                  => $User->getName()->value(),
            'lastname'              => $User->getLastName()->value(),
            'email'                 => $User->getEmail()->value(),
            'phone'                 => $User->getPhone()->value(),
            'username'              => $User->getUsername()->value(),
            'password'              => $User->getPassword()->value(),
            'id_position'           => $User->getIdPosition()->value(),
            'id_rol'                => $User->getIdRol()->value(),
        ]);
    }

    public function update(User $User): void
    {
        ModelsUser::findOrFail($User->getId()->value())->update([
            'name'                  => $User->getName()->value(),
            'lastname'              => $User->getLastName()->value(),
            'email'                 => $User->getEmail()->value(),
            'phone'                 => $User->getPhone()->value(),
            'id_position'           => $User->getIdPosition()->value(),
            'id_rol'                => $User->getIdRol()->value(),
        ]);
    }

    public function delete(NumInteger $idUser): void
    {
        ModelsUser::findOrFail($idUser->value())->delete();
    }

    public function list(): array
    {
        return ModelsUser::with('position', 'rol')->get()->toArray();
    }

    public function updatePassword(UserChangePassword $User): void
    {
        ModelsUser::findOrFail($User->getId()->value())->update([
            'password' => $User->getPassword()->value()
        ]);
    }

    public function login(Text $username, Text $password): User
    {


        $model = ModelsUser::with('rol', 'position')
            ->where('username', $username->value())->first();
//            ->where('password', $password->value())->first();
//        dd($model);

        if (!$model || !Hash::check($password->value(), $model->password)) {
            throw new \Exception('Usuario o contraseña incorrecta');
        }

        // Revoke all tokens...
        $model->tokens()->delete();

//        Auth::loginUsingId( $model->id );

        $user = new User(
            new NumInteger($model->id),
            new Text($model->code),
            new Text($model->name),
            new Text($model->lastname),
            new Text($model->email),
            new Text($model->phone),
            new Text($model->username),
            new Text(''),
            new NumInteger($model->id_position),
            new NumInteger($model->id_rol),
        );
        $user->setRol(new Text($model->rol->name));
        $user->setPosition(new Text($model->position->name));
        $user->setToken(new Text($model->createToken($model->password . ',' . $model->password)->plainTextToken));

        return $user;
    }

    public function validateToken(Text $token): bool
    {
        $tok = PersonalAccessToken::findToken($token->value());
        return $tok !== null;
    }
}
