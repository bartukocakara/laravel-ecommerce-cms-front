<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Message;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::all();

        $categories = Category::all();
        return view('front.index', compact('products', 'categories'));
    }

    public function categoryPage($category, $subCategory)
    {
        $cat1 =  Category::where('name', $category)->first();
        $cat2 = SubCategory::where('name', $subCategory)->first();

        if(isset($cat1) && isset($cat2)){
            $products = Product::where(['category_id' => $cat1->id, 'sub_category_id' => $cat2->id])->get();
            return view('front.category', compact('products', 'cat1', 'cat2'));
        }
        else{
            return redirect()->back();
        }
    }

    public function about()
    {
        return view('front.about');
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function contactSubmit(Request $request)
    {
        Message::insert(
            $request->except('_token')
        );
        return redirect()->with('status', 'Mesajınız iletildi');
    }

    public function profile()
    {
        $customer = Customer::where('id', Auth::id())->get();
        return view('front.profile', compact('customer'));
    }

    public function products()
    {
        $products= Product::all();
        return view('front.products', compact($products));
    }

    public function productDetail($slug)
    {
        $product = Product::where('product_slug', $slug)->first();
        $sizes = config("enums.sizes");
        return view('front.product-detail', compact('product', 'sizes'));
    }
}
