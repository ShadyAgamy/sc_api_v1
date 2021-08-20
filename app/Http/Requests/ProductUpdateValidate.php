<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateValidate extends FormRequest
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
            'title' => ['unique:products,title'],
            'image1' => ['mimes:jpeg,png,jpg,svg', 'max:5000'],
            'image2' => ['mimes:jpeg,png,jpg,svg', 'max:5000'],
            'image3' => ['mimes:jpeg,png,jpg,svg', 'max:5000'],
            'image4' => ['mimes:jpeg,png,jpg,svg', 'max:5000'],
            'image5' => ['mimes:jpeg,png,jpg,svg', 'max:5000'],
        ];
    }
    public function messages()
    {
        return [
            'title.unique' => 'title already taken!',
            'image1.mimes' => 'Only jpeg,png,jpg,svg image formats are allowed',
            'image2.mimes' => 'Only jpeg,png,jpg,svg image formats are allowed',
            'image3.mimes' => 'Only jpeg,png,jpg,svg image formats are allowed',
            'image4.mimes' => 'Only jpeg,png,jpg,svg image formats are allowed',
            'image5.mimes' => 'Only jpeg,png,jpg,svg image formats are allowed',
        ];
    }
}
