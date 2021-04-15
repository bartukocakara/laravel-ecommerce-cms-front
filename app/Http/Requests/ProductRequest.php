<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|string|max:30|min:8',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'color' => 'required',
            'price' => 'required|digits_between:2,5',
            'description' => 'required',
            'stock_status' => 'required|integer',
            'quantity' => 'required',
            'image_1' => 'required',
            'image_2' => 'required',
            'image_3' => 'required',
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "İsim alanını doldurmanız gerekli",
            "category_id.required" => "Kategori alanını doldurmanız gerekli",
            "sub_category_id.required" => "Alt kategori alanını doldurmanız gerekli",
            "color.required" => "Renk alanını doldurmanız gerekli",
            "price.required" => "Fiyat alanını doldurmanız gerekli",
            "description.required" => "Açıklama alanını doldurmanız gerekli",
            "stock_status.required" => "Stok durumu kodu alanını doldurmanız gerekli",
            "quantity.required" => "Miktar tipi alanını doldurmanız gerekli",
            "image_1.required" => "1. fotoğraf okudum alanını doldurmanız gerekli",
            "image_2.required" => "2. fotoğraf alanını doldurmanız gerekli",
            "image_3.required" => "3. fotoğraf alanını doldurmanız gerekli",
        ];
    }
}
