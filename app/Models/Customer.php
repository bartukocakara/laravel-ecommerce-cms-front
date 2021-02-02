<?php

namespace App\Models;

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

    public function rules(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:25',
            'surname' => 'required|string|max:25',
            'email' => 'required|string|max:40',
        ]);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

}
