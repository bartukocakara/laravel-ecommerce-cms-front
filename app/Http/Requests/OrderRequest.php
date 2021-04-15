<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'customer_name' => 'required|string|max:25',
            'customer_surname' => 'required|string|max:25',
            'customer_email' => 'required|string|max:40',
            'address' => 'required|string|max:100',
            'city_id' => 'required|string|max:3',
            'district_id' => 'required|string|max:980',
            'zip' => 'required|max:7',
            'tax' => 'required',
            'sub_total' => 'required',
            'grand_total' => 'required',
            'total_quantity' => 'required',
            'payment_type' => 'required',
            'accept_contract' => 'required',
        ];
    }

    public function messages()
    {
        return [
            "customer_name.required" => "İsim alanını doldurmanız gerekli",
            "customer_surname.required" => "Soyisim alanını doldurmanız gerekli",
            "customer_email.required" => "Email alanını doldurmanız gerekli",
            "address.required" => "Adres alanını doldurmanız gerekli",
            "city_id.required" => "İl alanını doldurmanız gerekli",
            "district_id.required" => "İlçe alanını doldurmanız gerekli",
            "zip.required" => "Posta kodu alanını doldurmanız gerekli",
            "payment_type.required" => "Ödeme tipi alanını doldurmanız gerekli",
            "accept_contract.required" => "Sözleşmeyi okudum alanını doldurmanız gerekli",
        ];
    }
}
