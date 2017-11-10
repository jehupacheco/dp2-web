<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleRequest extends FormRequest
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
            'plate' => 'unique:vehicles',
        ];
    }

    public function messages()
    {
        return [
            'plate.unique' => 'El identificador del vehículo ya ha sido tomado, elija uno nuevo'
        ];
    }
}
