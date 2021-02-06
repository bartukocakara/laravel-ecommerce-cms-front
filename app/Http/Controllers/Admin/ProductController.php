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
        $stock_status = config('enums.stock_status');
        return view('admin.products.index', compact('products', 'stock_status'));
    }

    public function changeProductStatus(Request $request)
    {

        if($request->status == 0)
        {
            $change = Product::where("id", $request->id)->update([
                'quantity' => 0,
                'stock_status' => $request->status
            ]);
        }
        else {
            $change = Product::where("id", $request->id)->update([
                'stock_status' => $request->status
            ]);
        }
        $datas = Product::find($request->id);
        $datas['product_status'] = config('enums.stock_status');
        if($change)
        {
            $datas['quantity'] = $datas->quantity;
            return response()->json($datas, 200);
        }
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

        $uploaded_file_1 = $request->image_1->getClientOriginalName();
        $uploaded_file_2 = $request->image_2->getClientOriginalName();
        $uploaded_file_3 = $request->image_3->getClientOriginalName();
        // dd(time().$uploaded_file_1);

        $file_name_1 = time().$uploaded_file_1;
        $file_name_2 = time().$uploaded_file_2;
        $file_name_3 = time().$uploaded_file_3;

        $request->image_1->move(public_path('storage/product-images/'), $file_name_1);
        $request->image_2->move(public_path('storage/product-images/'), $file_name_2);
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
        if($product)
        {
            $categories = Category::all();
            $subCategories = SubCategory::all();
            $colors = config('enums.colors');
            $sizes = config('enums.sizes');
            $stock_status = config('enums.stock_status');
            return view('admin.products.edit', compact('product', 'categories', 'subCategories',
                                                         'colors', 'sizes', 'stock_status'));
        }
        back();

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
        // dd($request->image_1->getClientOriginalName());
        $this->products->rules($request);
        $datas = $request->except(['_token', '_method']);
        $datas['product_slug'] = Str::slug($request->name);

        $uploadedFile_1 = $request->image_1->getClientOriginalName();
        $uploadedFile_2 = $request->image_2->getClientOriginalName();
        $uploadedFile_3 = $request->image_3->getClientOriginalName();
        // $fileName = time().$uploadedFile;

        // $this->updateImage($this->products, 'storage\\product-images\\', $id, $request, $fileName);

        $data = Product::where('id', $id)->first();
        unlink(public_path('storage\\product-images\\'.$data->image_1));
        unlink(public_path('storage\\product-images\\'.$data->image_2));
        unlink(public_path('storage\\product-images\\'.$data->image_3));

        $fileName1 = time().$request->image_1->getClientOriginalName();
        $fileName2 = time().$request->image_2->getClientOriginalName();
        $fileName3 = time().$request->image_3->getClientOriginalName();

        $request->image_1->move(public_path('storage/product-images'), $fileName1);
        $request->image_2->move(public_path('storage/product-images'), $fileName2);
        $request->image_3->move(public_path('storage/product-images'), $fileName3);

        // $datas['image_1'] = $fileName;
        Product::where('id', $id)->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'size' => $request->size,
            'color' => $request->color,
            'price' => $request->price,
            'description' => $request->description,
            'stock_status' => $request->stock_status,
            'quantity' => $request->quantity,
            'image_1' => $fileName1,
            'image_2' => $fileName2,
            'image_3' => $fileName3,
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
        $data = Product::find($id);
        $data->delete();
        unlink(public_path('storage\\product-images\\'.$data->image_1));
        unlink(public_path('storage\\product-images\\'.$data->image_2));
        unlink(public_path('storage\\product-images\\'.$data->image_3));

        return redirect()->route('products.index')->with('proDeleted', 'Ürün silindi');
    }
}
