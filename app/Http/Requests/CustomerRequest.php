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
            'name' => 'required|alpha|max:25',
            'surname' => 'required|alpha|max:25',
            'email' => 'required|string|max:40|unique:customers,email',
            'address' => 'required|min:20|max:100',
            'password' => 'required|min:8|max:20'
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "İsim alanını doldurmanız gerekli",
            "name.max" => "İsimin maksimum 25 karakter olabilir",
            "name.alpha" => "İsim sadece harflerden oluşmalı",
            "surname.required" => "Soyisim alanını doldurmanız gerekli",
            "surname.alpha" => "Soyisim sadece harflerden oluşmalı",
            "email.required" => "Email alanını doldurmanız gerekli",
            "email.unique" => "Bu email başka bir kullanıcıya ait",
            "address.required" => "Adres alanını doldurmanız gerekli",
            "address.max" => "Adres alanı maksimum 100 karakter olabilir",
            "password.required" => "Şifre alanını doldurmanız gerekli",
            "password.max" => "Şifre alanını minimum 8 maksimum 20 karakter olabilir",
            "password.min" => "Şifre alanını minimum 8 maksimum 20 karakter olabilir",
        ];
    }
}
