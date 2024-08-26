<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'id'            => 'required|numeric',
            'name'          => 'required|string|max:150',
            'lastname'      => 'required|string|max:150',
            'email'         => 'required|email|max:150',
            'phone'         => 'required|string|max:15',
            'id_position'   => 'required|numeric',
            'id_rol'        => 'required|numeric',
        ];
    }
}
