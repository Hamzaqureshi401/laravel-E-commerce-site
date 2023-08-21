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

            dd($check);
        
                $existingOrder = new Order();
                $existingOrder->user_id = Auth::user()->id;
                $existingOrder->total_amount = 0;
                $existingOrder->status = 'pending';
                $existingOrder->save();

            foreach ($request->product_id as $key => $item) {
                $orderDetail = new OrderDetail();
                $orderDetail->order_id = $existingOrder->id;
                $orderDetail->product_id = $item;
                $orderDetail->quantity = $request['quantity'][$key];
                $orderDetail->price = $request['price'][$key];
                $orderDetail->save();
            }
            DB::commit();
            return response()->json(['message' => 'Order placed successfully']);
        
    }

    public function quantityCheck($request){
if ($request->has('quantity')) {
    $allZeros = true;
    foreach ($request->quantity as $quantity) {
        if ($quantity != 0) {
            $allZeros = false;
            break;
        }
    }

    if ($allZeros) {
        return false;
    }
}

}
}
