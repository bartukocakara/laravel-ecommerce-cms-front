<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $products;

    public function __construct(Product $products)
    {
        $this->products = $products;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->get();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $colors = config('enums.colors');
        $sizes = config('enums.sizes');
        return view('admin.products.create', compact('categories', 'subCategories', 'colors', 'sizes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->products->rules($request);
        $datas = $request->except('_token');
        $datas['product_slug'] = Str::slug($request->name);
        $uploaded_file_1 = $request->file()['image_1']->getClientOriginalName();
        $file_name_1 = time().$uploaded_file_1;
        $request->image_1->move(public_path('storage/product-images/'), $file_name_1);

        $uploaded_file_2 = $request->file()['image_2']->getClientOriginalName();
        $file_name_2 = time().$uploaded_file_2;
        $request->image_2->move(public_path('storage/product-images/'), $file_name_2);

        $uploaded_file_3 = $request->file()['image_3']->getClientOriginalName();
        $file_name_3 = time().$uploaded_file_3;
        $request->image_3->move(public_path('storage/product-images/'), $file_name_3);
        $datas["image_1"] = $file_name_1;
        $datas["image_2"] = $file_name_2;
        $datas["image_3"] = $file_name_3;

        Product::insert([
            $datas
        ]);

        return redirect()->route('products.index')->with('success', 'Ürün eklendi');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $colors = config('enums.colors');
        $sizes = config('enums.sizes');
        return view('admin.products.edit', compact('product', 'categories', 'subCategories', 'colors', 'sizes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $this->products->rules($request);
        $datas = $request->except(['_token', '_method']);
        $datas['product_slug'] = Str::slug($request->name);

        $data = Product::where('id', $id)->first();
        unlink(public_path('storage/product-images'.$data->image_1));
        unlink(public_path('storage/product-images'.$data->image_2));
        unlink(public_path('storage/product-images'.$data->image_3));
        $fileName1 =$request->file()['image_1']->getClientOriginalName();
        $fileName2 =$request->file()['image_2']->getClientOriginalName();
        $fileName3 =$request->file()['image_3']->getClientOriginalName();

        $request->image_1->move(public_path('storage/product-images/'), $fileName1);
        $request->image_2->move(public_path('storage/product-images/'), $fileName2);
        $request->image_2->move(public_path('storage/product-images/'), $fileName3);
        Product::find($id)->update([
            $datas
        ]);

        return redirect()->route('products.index')->with('proUpdated', 'Ürün güncellendi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);

        return redirect()->route('products.index')->with('proDeleted', 'Ürün silindi');
    }
}
