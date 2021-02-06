<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    protected $table = "categories";

    public function rules(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:25',
        ]);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
