<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTypeRequest extends FormRequest
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
            'name' => ['required', 'unique:types', 'min:4',  'max:100'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Il nome é obbligatorio",
            'name.min' => "Il nome deve essere almeno di :min caratteri",
            'name.max' => "Il nome deve essere almeno di :max caratteri"
        ];
    }
}
