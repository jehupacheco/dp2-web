<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'phone' => 'size:14',
            'password' => 'required|confirmed|min:8|max:16',
            'password_confirmation' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'password.required'     => 'La contraseña es obligatoria',
            'password_confirmation.required' => 'La confirmación de la contraseña es obligatoria',
            'password.min' => 'La contraseña debe contener como minimo 8 caracteres',
            'password.max' => 'La contraseña debe contener como máximo 16 caracteres',
            'password.confirmed' => 'La contraseña y la confirmación de la contraseña no coinciden',
            'phone.size' => 'El número de teléfono celular debe contener 9 digitos'
        ];
    }
}
