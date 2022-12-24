<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'          => 'required',
            'nik'           => 'required|numeric|digits:16',
            'gender'        => 'required',
            'place_birth'   => 'required',
            'birth_date'    => 'required',
            'phone'         => 'required|numeric|digits_between:10,13',
            'email'         => 'required|email:rfc,dns',
            'province'      => 'required',
            'city'          => 'required',
            'district'      => 'required',
            'village'       => 'required',
            'street'        => 'required',
            'postal_code'   => 'required',

        ];
    }
}
