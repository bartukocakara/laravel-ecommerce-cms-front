<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;


class Customer extends Model
{
    use Authenticatable;
    use HasFactory;

    protected $fillable = ['name', 'surname', 'email', 'password', 'phone', 'address', 'second_address'];

    protected $table = "customers";

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

}
