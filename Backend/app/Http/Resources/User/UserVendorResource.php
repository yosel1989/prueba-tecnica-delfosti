<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserVendorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'        => $this->getId()->value(),
            'code'      => $this->getCode()->value(),
            'name'      => $this->getName()->value(),
            'lastname'  => $this->getLastname()->value(),
        ];
    }
}
