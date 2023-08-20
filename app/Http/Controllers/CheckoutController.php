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
        $request->validate([
        'totalAmount' => 'required|numeric|min:0',
        'cartItems' => 'required|array|min:1',
        'cartItems.*.product_id' => 'required', 
        'cartItems.*.quantity' => 'required|integer|min:1'
        ]);
        DB::beginTransaction();
        try {
            
            $existingOrder = Order::where('user_id', Auth::user()->id)
                ->whereNull('placed_at')
                ->first();

           
            if ($existingOrder) {
                
                $existingOrder->orderDetails()->delete();

                
                $existingOrder->total_amount = $request->totalAmount;
                $existingOrder->save();
            } else {
                
                $existingOrder = new Order();
                $existingOrder->user_id = Auth::user()->id;
                $existingOrder->total_amount = $request->totalAmount;
                $existingOrder->status = 'pending';
                $existingOrder->save();
            }

            
            foreach ($request->cartItems as $item) {
                $orderDetail = new OrderDetail();
                $orderDetail->order_id = $existingOrder->id;
                $orderDetail->product_id = $item['product_id'];
                $orderDetail->quantity = $item['quantity'];
                $orderDetail->price = $item['price'];
                $orderDetail->save();
            }
            DB::commit();
            return response()->json(['message' => 'Order placed successfully']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'An error occurred while processing your order'], 500);
        }
    }
}
