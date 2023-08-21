<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class PaymentSettingController extends Controller
{
    public function allPayment(){

        $settings = Setting::first();
        return view('paymentExtention' , compact('settings'));
    }

    public function updatePayment($request){

         $settings = Setting::first();

        if ($request == 'payoneer'){
            if($settings->payoneer_enabled == true){
                $settings->payoneer_enabled = false;
            }else{
                $settings->payoneer_enabled = true;
            }

        }elseif ($request == 'Paypal') {
            if($settings->paypal_enabled == true){
                $settings->paypal_enabled = false;
            }else{
                $settings->paypal_enabled = true;
            }
        }

        $settings->save();

         return redirect()->route('allPayment')->with('Success', 'Updated');

    }
}
