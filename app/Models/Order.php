<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'order_code', 'customer_name', 'customer_surname', 'customer_email', 'city', 'district', 'zip', 'products', 'discount', 'tax', 'sub_total', 'grand_total', 'total_quantity', 'shipping_cost', 'note', 'shipping_company', 'delivery_time',  'payment_type', 'status', 'card_number', 'card_expiration', 'card_cvv'];

    protected $table = "orders";

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
}
