<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        // dd(Carbon::now()->format('m'));
        $monthlyOrders = Order::whereMonth('created_at', Carbon::now()->format('m'))->sum('grand_total');
        $yearlyOrders = Order::whereYear('created_at', Carbon::now()->format('Y'))->sum('grand_total');
        $canceledOrders = Order::where('status', 'CANCELED')->sum('grand_total');
        // dd($canceledOrders);
        return view('admin.home', compact('monthlyOrders', 'yearlyOrders', 'canceledOrders'));
    }
}
