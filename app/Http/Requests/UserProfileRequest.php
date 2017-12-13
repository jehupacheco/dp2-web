<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email|unique:users',

        ];
    }

    public function messages()
    {
        return [
            'email.required'     => 'El correo es obligatorio',
            'email.unique'      => 'El correo electrónico especificado ya está en uso',
        ];
    }
}
