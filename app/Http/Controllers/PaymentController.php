<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function checkout()
    {
        $checkout = Cart::where('customer_id', session('customer')['id'])->first();
        $products = [];
        if($checkout)
        {
            $productsInCart = json_decode($checkout->products, true);
            $products = $productsInCart;
        }
        $payment_types = config('enums.payment_types');
        $order_status = config('enums.order_status');
        $delivery_times = config('enums.delivery_times');
        return view('front.checkout', compact('checkout', 'products', 'payment_types', 'order_status', 'delivery_times'));
    }
}
