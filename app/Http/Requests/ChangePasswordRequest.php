<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'password_current' => 'required',
            'password' => 'required|confirmed|min:6|max:16',
            'password_confirmation' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'password_current.required'     => 'La contraseña es obligatoria',
            'password.required' => 'El campo es requerido',
            'password_confirmation.required' => 'La confirmación de la contraseña es obligatoria',
            'password.min' => 'La contraseña debe contener como minimo 6 caracteres',
            'password.max' => 'La contraseña debe contener como máximo 16 caracteres',
            'password.confirmed' => 'La contraseña y la confirmación de la contraseña no coinciden',
        ];
    }
}
