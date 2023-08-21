<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use Auth;
use DB;

class CheckoutController extends Controller
{
    public function store(Request $request)
    {

            $check = $this->quantityCheck($request);
            if($check == false){
                 return redirect()->back()->withError('At Least One Product Quantity must be greater then 1');
            }
        
                $existingOrder = new Order();
                $existingOrder->user_id = Auth::user()->id;
                $existingOrder->status = 'pending';
                $existingOrder->payment_method = $request->paymentMethod ?? 'Cash on Delivery';

                $existingOrder->save();

            foreach ($request->product_id as $key => $item) {
                $orderDetail = new OrderDetail();
                $orderDetail->order_id = $existingOrder->id;
                $orderDetail->product_id = $item;
                $orderDetail->quantity = $request['quantity'][$key];
                $orderDetail->price = $request['price'][$key];
                if($orderDetail->quantity > 0){
                    $orderDetail->save();
                }
                
            }
            DB::commit();
            return redirect()->back()->withSuccess('Order Saved Success fully!');
    }

    public function quantityCheck($request){
    
    foreach ($request->quantity as $quantity) {
            if($quantity != 0){
                return true;
            } 
    }
        return false;

    }
}
