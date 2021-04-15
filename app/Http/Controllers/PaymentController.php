<?php

namespace App\Http\Controllers;

use App\Mail\OrderComplete;
use App\Mail\OrderDetail;
use App\Models\Cart;
use App\Models\City;
use App\Models\Customer;
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
        $check = Cart::where('customer_id', session('customer')['id'])->first();
        $cities = City::all();
        $products = [];
        $customer = Customer::where('id', session('customer')['id'])->first();
        if($check)
        {
            $productsInCart = json_decode($check->products, true);
            $products = $productsInCart;
        }
        $payment_types = config('enums.payment_types');
        $order_status = config('enums.order_status');
        $delivery_times = config('enums.delivery_times');
        return view('front.checkout', compact('check', 'cities', 'products', 'payment_types', 'order_status', 'delivery_times', 'customer'));
    }

    public function getDistrict(Request $request)
    {
        $data['districts'] = District::where("city_id", $request->city_id)
                    ->get(["name","id"]);
        return response()->json($data, 200);
    }

    public function completeOrder(Request $request)
    {
        $this->rules($request);
        $datas = $request->except('_token');
        $datas['grand_total'] = number_format($request->grand_total, 2);
        $datas['sub_total'] = number_format($request->sub_total, 2);
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
