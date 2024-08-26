<?php

namespace App\Http\Resources\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserLoginResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'                    => $this->getId()->value(),
            'code'                  => $this->getCode()->value(),
            'name'                  => $this->getName()->value(),
            'lastname'              => $this->getLastName()->value(),
            'email'                 => $this->getEmail()->value(),
            'phone'                 => $this->getPhone()->value(),
            'username'              => $this->getUsername()->value(),
            'password'              => $this->getPassword()->value(),
            'id_position'           => $this->getIdPosition()->value(),
            'position'              => $this->getPosition()->value(),
            'id_rol'                => $this->getIdRol()->value(),
            'rol'                   => $this->getRol()->value(),
            'token'                 => $this->getToken()->value(),
        ];
    }
}
