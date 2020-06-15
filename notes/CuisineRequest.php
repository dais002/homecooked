<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CuisineRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // bypass auth
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'type' => ['required', 'max:255', 'string']
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'type.string' => 'message here',
    //         'type.required' => 'required error message here',
    //         'type.max' => 'too many letters'
    //     ];
    // }
}
