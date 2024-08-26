<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'name'          => 'required|string|max:150',
            'lastname'      => 'required|string|max:150',
            'email'         => 'required|email|max:150',
            'phone'         => 'required|string|max:15',
            'username'      => 'required|string|max:25',
            'password'      => 'required|string|max:20',
            'id_position'   => 'required|numeric',
            'id_rol'        => 'required|numeric',
        ];
    }
}
