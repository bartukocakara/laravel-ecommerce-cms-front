<?php

namespace App\Models;

use App\Http\Requests\OrderRequest;
use App\Mail\OrderCancel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'customer_name', 'customer_surname', 'customer_email', 'address', 'city_id',
                            'district_id', 'zip', 'products', 'tax', 'sub_total', 'grand_total', 'total_quantity', 'shipping_cost',
                            'note', 'shipping_company', 'delivery_time',  'payment_type', 'status', 'accept_contract'];

    protected $table = "orders";

    public function rules(OrderRequest $request)
    {
        $request->validate([
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
        ]);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }

    public function orderCanceled(Request $request, $products)
    {
        if($request->status == "CANCELED")
        {
            Mail::to('kocakarabartu@gmail.com')->send(new OrderCancel($request->except('_token'), $products));
        }
    }
}
