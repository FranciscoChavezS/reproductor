<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleCreateRequest extends FormRequest
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
    public function rules() //validación en el servidor
    {
        return [
            'name'=> 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'El campo nombre de rol es requerido'
        ];
    }
}
