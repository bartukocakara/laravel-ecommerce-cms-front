<?php

namespace App\Http\Controllers;

use App\Mail\NewMessageAdmin;
use App\Mail\NewMessageCustomer;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Message;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        $stockStatus = config('enums.stock_status');
        return view('front.index', compact('products', 'categories', 'stockStatus'));
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
        $message_types = config('enums.message_types');
        return view('front.contact', compact('message_types'));
    }

    public function contactSubmit(Request $request, Message $message)
    {
        $send = Message::create(
                $request->except('_token')
            );
        $types = config('enums.message_types');
        if($send)
        {
            Mail::to('kocakarabartu@gmail.com')->send(new NewMessageCustomer($send));
            Mail::to('kocakarabartu@gmail.com')->send(new NewMessageAdmin($send, $types));
            return back()->with('status', 'Mesajınız iletildi');
        }
    }

    public function products()
    {
        $products= Product::all();
        $stockStatus = config('enums.stock_status');
        return view('front.products', compact('products', 'stockStatus'));
    }

    public function productDetail($slug)
    {
        $product = Product::where('product_slug', $slug)->first();
        $sizes = config("enums.sizes");
        $stockStatus = config('enums.stock_status');
        if($product)
        {
            return view('front.product-detail', compact('product', 'sizes', 'stockStatus'));
        }
        back();
    }

    public function kvkkPage()
    {
        return view('front.kvkk');
    }

    public function cancelationCondition()
    {
        return view('front.cancel-return-policy');
    }

    public function distanceContract()
    {
        return view('front.distance-contract');
    }
}
