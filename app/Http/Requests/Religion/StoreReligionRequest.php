<?php

namespace App\Http\Requests\Religion;

use Illuminate\Foundation\Http\FormRequest;

class StoreReligionRequest extends FormRequest
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
            'name'          => 'required|unique:religions,name',
            'kitab_suci'    => 'required'
        ];
    }
}
