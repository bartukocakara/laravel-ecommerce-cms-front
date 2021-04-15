<?php

namespace App\Models;

use App\Http\Requests\CustomerRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Http\Request;


class Customer extends Model
{
    use Authenticatable;
    use HasFactory;

    protected $fillable = ['name', 'surname', 'email', 'password', 'phone', 'address', 'second_address'];

    protected $table = "customers";

    public function rules(CustomerRequest $request)
    {
        $request->validate([
            'name' => 'required|string|max:25',
            'surname' => 'required|string|max:25',
            'email' => 'required|string|max:40|unique:customers,email',
            'address' => 'required|min:20|max:100',
            'password' => 'required|min:8|max:20'
        ]);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

}
