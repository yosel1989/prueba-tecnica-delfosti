<?php

namespace App\Http\Resources\OrderProduct;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CreateOrderProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_order'      => $this->getIdOrder()->value(),
            'id_product'    => $this->getIdProduct()->value(),
            'quantity'      => $this->getQuantity()->value(),
            'price'         => $this->getPrice()->value(),
        ];
    }
}
