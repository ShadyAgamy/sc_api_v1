<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductValidate extends FormRequest
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
            'title' => ['required', 'unique:products,title'],
            'price' => ['required'],
            'currency' => ['required'],
            'description' => ['required'],
            'image_style' => ['required'],
            'image_header_ratio' => ['required'],
            'image_header_image' => ['required'],
            'size_color_pickers' => ['required'],
            'description_style' => ['required'],
            'checkout_style' => ['required'],
            'product_type' => ['required'],
            'shipping' => ['required'],
            'shipment_usa' => ['required'],
            'shipment_int' => ['required'],
            'image1' => ['required', 'mimes:jpeg,png,jpg,svg', 'max:5000'],
            'image2' => ['mimes:jpeg,png,jpg,svg', 'max:5000'],
            'image3' => ['mimes:jpeg,png,jpg,svg', 'max:5000'],
            'image4' => ['mimes:jpeg,png,jpg,svg', 'max:5000'],
            'image5' => ['mimes:jpeg,png,jpg,svg', 'max:5000'],
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'This field is mandatory!',
            'title.unique' => 'title already taken!',
            'price.required' => 'This field is mandatory!',
            'currency.required' => 'This field is mandatory!',
            'description.required' => 'This field is mandatory!',
            'image_style.required' => 'This field is mandatory!',
            'image_header_ratio.required' => 'This field is mandatory!',
            'image_header_image.required' => 'This field is mandatory!',
            'size_color_pickers.required' => 'This field is mandatory!',
            'description_style.required' => 'This field is mandatory!',
            'checkout_style.required' => 'This field is mandatory!',
            'shipment_usa.required' => 'This field is mandatory!',
            'shipment_int.required' => 'This field is mandatory!',
            'shipping.required' => 'This field is mandatory!',
            'image1.required' => 'This field is mandatory!',
            'image1.mimes' => 'Only jpeg,png,jpg,svg image formats are allowed',
            'image2.mimes' => 'Only jpeg,png,jpg,svg image formats are allowed',
            'image3.mimes' => 'Only jpeg,png,jpg,svg image formats are allowed',
            'image4.mimes' => 'Only jpeg,png,jpg,svg image formats are allowed',
            'image5.mimes' => 'Only jpeg,png,jpg,svg image formats are allowed',
        ];
    }
}
