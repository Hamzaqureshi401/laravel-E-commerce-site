<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Auth;

class OrderController extends Controller
{
    public function getOrders(){

        if(Auth::user()->role == 'admin'){
            $orders = Order::get();    
        }else{
            $orders = Order::where('user_id' , Auth::id())->get();
        }
        return view('all_orders' , compact('orders'));
        
    }
}
