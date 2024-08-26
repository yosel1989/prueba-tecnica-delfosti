<?php

namespace App\Http\Resources\OrderHistory;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ListOrderHistoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
//            'id_order'      => $this->getIdOrder()->value(),
            'id_status'    => $this->getIdStatus()->value(),
            'status'    => $this->getStatus()->value(),
            'created_at'      => $this->getCreatedAt()->value()
        ];
    }
}
