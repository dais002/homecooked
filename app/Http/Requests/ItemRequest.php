<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
            'name' => ['max:255', 'string', 'required'],
            'description' => ['string', 'max:255'],
            'price' => ['integer', 'required'],
            'image' => ['string', 'max:255'],
            'limit' => ['integer', 'required'],
            'store_id' => ['integer', 'required'],
        ];
    }
}
