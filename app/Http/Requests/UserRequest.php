<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name'          => 'required | string | min:4 | max:40',
            'apellido'      => 'required | string | min:4 | max:40',
            'sis'           => 'required | string | min:9 | max:9 | unique:users',
            'ci'            => 'required | string | min:7 | max:7| unique:users',
            'email'         => 'required | unique:users',
            'password'      => 'required',
        ];
    }
}
