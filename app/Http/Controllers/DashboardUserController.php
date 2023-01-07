<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class DashboardUserController extends Controller
{
    public function dashboard()
    {
        return view('frontend.dashboard');
    }

    public function orders()
    {
        $orders = Order::where('user_id', auth()->user()->id)->paginate(10);
        return view('frontend.orders', compact('orders'));
    }
}
