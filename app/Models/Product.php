<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'sub_category_id', 'name', 'size', 'color', 'price', 'description', 'product_slug', 'quantity', 'image_1', 'image_2', 'image_3', 'stock_status'];

    protected $table = "products";

    public function rules(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:products,name',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'color' => 'required',
            'price' => 'required|digits_between:2,5',
            'description' => 'required',
            'quantity' => 'required',
            'image_1' => 'required',
            'image_2' => 'required',
            'image_3' => 'required',
            ]);
    }

    public function insertImage(Request $request, $datas)
    {
        // $uploaded_file_1 = $request->file()['image_1']->getClientOriginalName();
        // $file_name_1 = time().$uploaded_file_1;
        // $request->image_1->move(public_path('storage/product-images/'), $file_name_1);

        // $uploaded_file_2 = $request->file()['image_2']->getClientOriginalName();
        // $file_name_2 = time().$uploaded_file_2;
        // $request->image_2->move(public_path('storage/product-images/'), $file_name_2);

        // $uploaded_file_3 = $request->file()['image_3']->getClientOriginalName();
        // $file_name_3 = time().$uploaded_file_3;
        // $request->image_3->move(public_path('storage/product-images/'), $file_name_3);
        // $datas["image_1"] = $file_name_1;
        // $datas["image_2"] = $file_name_2;
        // $datas["image_3"] = $file_name_3;

    }

    public function updateImage($modalName, $path, $id, Request $request, $fileName1, $fileName2, $fileName3)
    {
        $data = $modalName::where('id', $id)->first();
        unlink(public_path('storage/'.$path."/".$data->image_1));
        unlink(public_path('storage/'.$path."/".$data->image_2));
        unlink(public_path('storage/'.$path."/".$data->image_3));

        $request->image_1->move(public_path('storage/'.$path), $fileName1);
        $request->image_2->move(public_path('storage/'.$path), $fileName2);
        $request->image_2->move(public_path('storage/'.$path), $fileName3);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
