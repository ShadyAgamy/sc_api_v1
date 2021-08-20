<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationValidate extends FormRequest
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
            'username' => ['required', 'alpha_dash', 'string', 'max:255', 'unique:users,username'],
            'full_name' => ['required','string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'string', 'min:8'],
            'store_name' => ['required', 'string', 'max:255'],
            'store_logo' => ['required', 'mimes:jpeg,png,jpg,svg', 'max:5000'],
            'instagram_image' => ['mimes:jpeg,png,jpg,svg', 'max:5000'],
            'snapchat_image' => ['mimes:jpeg,png,jpg,svg', 'max:5000'],
            'pinterest_image' => ['mimes:jpeg,png,jpg,svg', 'max:5000'],
            'tiktok_image' => ['mimes:jpeg,png,jpg,svg', 'max:5000']
        ];
    }
    public function messages()
    {
        return [
            'store_name.required' => 'Store name is required!',
            'store_logo.required' => 'Store logo is required!',
            'store_logo.mimes' => 'Only jpeg,png,jpg,svg image formats are allowed',
            'store_logo.max' => 'Maximum image size allowed is 5MB',
            'snapchat_image.mimes' => 'Only jpeg,png,jpg,svg image formats are allowed',
            'snapchat_image.max' => 'Maximum image size allowed is 5MB',
            'instagram_image.mimes' => 'Only jpeg,png,jpg,svg image formats are allowed',
            'instagram_image.max' => 'Maximum image size allowed is 5MB',
            'pinterest_image.mimes' => 'Only jpeg,png,jpg,svg image formats are allowed',
            'pinterest_image.max' => 'Maximum image size allowed is 5MB',
            'tiktok_image.mimes' => 'Only jpeg,png,jpg,svg image formats are allowed',
            'tiktok_image.max' => 'Maximum image size allowed is 5MB',
        ];
    }
}
