<?php

namespace App\Http\Resources\Order;

use App\Http\Resources\OrderHistory\ListOrderHistoryResource;
use App\Http\Resources\User\UserVendorResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderListResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            'id' => $this->getId()->value(),
            'vendor' => UserVendorResource::make($this->getVendor()),
            'id_delivery' => $this->getIdDelivery()->value(),
            'date_delivery' => $this->getDateDelivery()->value(),
            'id_status' => $this->getIdStatus()->value(),
            'status' => $this->getStatus()->value(),
            'total' => $this->getTotal()->value(),
            'created_at' => $this->getCreatedAt()->value(),
            'history' =>  ListOrderHistoryResource::collection($this->getHistory()->all())
        ];
    }
}
