<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'products', 'total_price', 'total_quantity', 'shipping_cost'];

    protected $table = "carts";

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
}
