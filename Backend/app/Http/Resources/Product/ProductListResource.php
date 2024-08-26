<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductListResource extends JsonResource
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
            'sku' => $this->getSku()->value(),
            'name' => $this->getName()->value(),
            'price' => $this->getPrice()->value(),
            'stock' => $this->getStock()->value(),
            'id_type_product' => $this->getTypeProductId()->value(),
            'id_unit_measurement' => $this->getUnitMeasurementId()->value(),
            'tags' => $this->getTags()->withCommaToArray(),
        ];
    }
}
