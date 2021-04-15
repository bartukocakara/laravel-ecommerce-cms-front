<?php

namespace App\Models;

use App\Http\Requests\SubCategoryRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    protected $table = "sub_categories";

    public function rules(SubCategoryRequest $request)
    {
        $request->validate([
            'name' => 'required|string|max:25',
            'surname' => 'required|string|max:25',
            'email' => 'required|string|max:40',
            'address' => 'required|min:20|max:100',
            'password' => 'required|min:8|max:20'
        ]);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
