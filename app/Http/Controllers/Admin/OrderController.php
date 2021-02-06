<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\OrderCancel;
use App\Mail\OrderOnTheWay;
use App\Models\City;
use App\Models\District;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public $orders;

    public function __construct(Order $orders)
    {
        $this->orders = $orders;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::latest()->with('customer')->get();
        $order_status = config('enums.order_status');
        return view('admin.orders.index', compact('orders', 'order_status'));
    }


    public function changeOrderStatus(Request $request)
    {
        $changeStatus =  Order::where('id', $request->id)->update([
            'status' => $request->status
        ]);
        $datas = Order::where('id', $request->id)->with('district', 'city')->first();
        $products = json_decode($datas->products, true);
        $datas['order_status'] = config('enums.order_status');
        switch ($request->status) {
            case 'CANCELED':
                $datas->response = "Sipariş iptal edilip müşteri bilgilendirilmiştir.";
                // Mail::to($request->email)->send(new OrderCancel($datas, $products));
                return response()->json($datas, 200);
                break;
            case 'ON_DELIVERY':
                $datas->response = "Sipariş yola çıkarılıp müşteri bilgilendirilmiştir.";
                // Mail::to($request->email)->send(new OrderOnTheWay($datas, $products, $datas->city->name, $datas->district->name));
                return response()->json($datas, 200);
            default:
                # code...
                break;
        }
        if($changeStatus)
        {
            return response()->json($datas, 200);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     $cities = City::all();
    //     $districts = District::all();
    //     $products = Product::all();
    //     $colors = config('enums.colors');
    //     $delivery_times = config('enums.delivery_times');
    //     $payment_types = config('enums.payment_types');
    //     $order_status = config('enums.order_status');
    //     $shipping_companies = config('enums.shipping_companies');
    //     return view('admin.orders.create', compact('products',
    //                                                 'colors', 'cities', 'districts', 'delivery_times',
    //                                                 'payment_types', 'order_status', 'shipping_companies'));
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|unique:ordegories,name'
    //     ]);

    //     // Creadi kartı 2343-****-****-***2 formatında kaydedilecek
    //     Order::insert([
    //         'name' => $request->name,
    //     ]);

    //     return redirect()->back()->with('success', 'Sipariş eklendi');
    // }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::where('id', $id)->with('customer')->first();
        $products = Product::all();
        $colors = config('enums.colors');
        $productsOrdered = json_decode($order->products, true);
        $cities = City::all();
        $districts = District::all();
        $delivery_times = config('enums.delivery_times');
        $payment_types = config('enums.payment_types');
        $order_status = config('enums.order_status');
        $shipping_companies = config('enums.shipping_companies');
        return view('admin.orders.show', compact('order', 'productsOrdered', 'products',
                                                 'colors', 'cities', 'districts', 'delivery_times',
                                                    'payment_types', 'order_status', 'shipping_companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     $this->orders->rules($request);
    //     Order::find($id)->update([
    //         $request->except(['_token', '_method', 'products'])
    //     ]);
    //     $products = $this->orders::find($id);
    //     dd($products);

    //     if($request->order_status)
    //     $this->orders->orderCanceled($request, $id);

    //     return redirect()->route('orders.index')->with('ordUpdated', 'Sipariş güncellendi');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::destroy($id);

        return redirect()->route('orders.index')->with('ordDeleted', 'Sipariş silindi');
    }
}
