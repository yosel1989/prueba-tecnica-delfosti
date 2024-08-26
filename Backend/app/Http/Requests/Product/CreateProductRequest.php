<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'sku' => 'required|string|max:20',
            'name' => 'required|string|max:250',
            'type_product_id' => 'required|numeric',
            'tags' => 'required|string|max:500',
            'price' => 'required|numeric',
            'unit_measurement_id' => 'required|numeric',
            'stock' => 'required|numeric',
        ];
    }
}
