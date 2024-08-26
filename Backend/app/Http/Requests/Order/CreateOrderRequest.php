<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
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
            'id_vendor'             =>  'required|numeric',
            'date_delivery'         =>  'required|date',
            'detail'                =>  'present|array|min:1',
            'detail.*.id_product'   =>  'required|numeric',
            'detail.*.quantity'     =>  'required|numeric',
            'detail.*.price'        =>  'required|numeric',
        ];
    }
}
