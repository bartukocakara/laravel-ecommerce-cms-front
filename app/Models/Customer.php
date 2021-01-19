<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['cart_id', 'name', 'surname', 'email', 'password', 'phone', 'address', 'second_address', 'token'];

    protected $table = "customers";

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

}
