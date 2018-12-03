<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => 'unique:loyal_customers,email|required|string|email|max:255',
            'password' => 'required|string|min:3|confirmed',
            'phone' => 'required|max:12|min:9',
            'address' => 'required|string',
            'password_confirmation' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.max' => trans('frontend.nameMax'),
            'email.unique' => trans('frontend.emailUnique'),
            'password.min' => trans('frontend.passwordMin'),
            'phone.max' => trans('frontend.phoneMax'),
            'phone.min' => trans('frontend.phoneMin'),
            'name.required' => trans('frontend.empty'),
            'email.required' => trans('frontend.empty'),
            'pasword.required' => trans('frontend.empty'),
            'phone.required' => trans('frontend.empty'),
            'address.required' => trans('frontend.empty'),
            'password_confirmation.required' => trans('frontend.empty'),
        ];
    }
}
