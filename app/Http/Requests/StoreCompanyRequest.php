<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
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
            'name' => 'required|string|unique:company,name|max:255',
            //'code' => 'nullable|string|exists:company,id',
        ];
    }


    public function attributes()
    {
        return [
            'name' => __('keywords.name'),
            //'code' => __('keywords.code'),          
        ];
    }
}
