<?php

namespace App\Http\Controllers;

use App\Mail\OrderCancel;
use App\Mail\OrderCancelRequest;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CustomerController extends Controller
{
    public $customer;

    public function __construct(Customer $customer)
    {
        return $this->customer = $customer;
    }

    public function customerOrders()
    {
        $orders = Order::where('customer_id', session('customer')['id'])->orderBy('created_at', 'DESC')->get();
        return view('front.customer-orders', compact('orders'));
    }

    // public function customerOrderDetail($order_code)
    // {
    //     $order = Order::where('order_code', $order_code)->first();
    //     $products = json_decode($order->products, true);
    //     return view('front.customer-order-detail', compact('order', 'products'));
    // }

    public function cancelOrder($ordercode)
    {
        $datas = Order::where('order_code', $ordercode)->first();
        $products = json_decode($datas->products, true);
        if($datas->status == 'DECLINED')
        {
            return back()->with('already_declined', 'Sipariş iptal talebiniz önceden oluşturulmuş.Ekibimiz email yoluyla dönüş sağlayacaktır');
        }
        elseif($datas)
        {
            $datas->update([
                'status' => 'DECLINED'
            ]);
            Mail::to('kocakarabartu@gmail.com')->send(new OrderCancelRequest($datas, $products));
            return back()->with('success', 'Sipariş iptal talebiniz gönderilmiştir.Yetkili ekibimiz size email yoluyla dönüş sağlayacaktır.');
        }
        back()->with('fail', 'Birşeyler yanlış gitti.Sorunun sebebini anlamak için bize ulaşabilirsiniz.');
    }


    public function profile()
    {
        return view('front.profile');
    }

    public function profileDetail()
    {
        $customer = Customer::where('id', session('customer')['id'])->first();
        // dd($customer);
        return view('front.profile-detail-info', compact('customer'));
    }

    public function profileUpdate(Request $request)
    {
        $this->customer->rules($request);
        $update = Customer::where('id', session('customer')['id'])->update($request->except('_token'));
        if($update)
        {
            $success = "Profil başarıyla güncellendi";
            $customer = Customer::where('id', session('customer')['id'])->first();
            return view('front.profile-detail-info', compact('customer', 'success'));
        }
        return view('front.profile-detail-info');
    }
}
