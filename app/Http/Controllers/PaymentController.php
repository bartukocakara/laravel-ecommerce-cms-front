<?php

namespace App\Http\Controllers;

use App\Mail\OrderComplete;
use App\Mail\OrderDetail;
use App\Models\Cart;
use App\Models\City;
use App\Models\District;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public $orders;

    public function __construct(Order $orders)
    {
        return $this->orders = $orders;
    }
    public function checkout()
    {
        $checkout = Cart::where('customer_id', session('customer')['id'])->first();
        $cities = City::all();
        $products = [];
        if($checkout)
        {
            $productsInCart = json_decode($checkout->products, true);
            $products = $productsInCart;
        }
        $payment_types = config('enums.payment_types');
        $order_status = config('enums.order_status');
        $delivery_times = config('enums.delivery_times');
        return view('front.checkout', compact('checkout', 'cities', 'products', 'payment_types', 'order_status', 'delivery_times'));
    }

    public function getDistrict(Request $request)
    {
        $data['districts'] = District::where("city_id", $request->city_id)
                    ->get(["name","id"]);
        return response()->json($data, 200);
    }

    public function completeOrder(Request $request)
    {
        $this->orders->rules($request);
        $datas = $request->except('_token');
        $products = $request->products;
        $datas['products'] = json_encode($products);
        $datas['order_code'] = mt_rand(100000, 999999);
        $accepted = Order::insert([
            $datas
        ]);
        $city = City::where('id', $request->city_id)->first()->name;
        $district = District::where('id', $request->district_id)->first()->name;

        if($accepted)
        {
            // Ürünleren siparişteki miktarları kadar düş


            // Admine gider
            // Mail::to('kocakarabartu@gmail.com')->send(new OrderComplete($datas, $products, $city, $district));
            //Müşteriye gider
            // Mail::to('kocakarabartu@gmail.com')->send(new OrderDetail($datas, $products, $city, $district));
            Cart::where('customer_id', session('customer')['id'])->delete();
            $order = Order::where('customer_id', session('customer')['id'])->latest()->first();
            return view('front.order-completed', compact('order'));
        }
        else{
            back();
        }


    }
}
