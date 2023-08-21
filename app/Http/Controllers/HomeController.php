<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Setting;

use Auth;

class HomeController extends Controller
{
   
    public function index()
    {
        $setting = Setting::first();

        $products = Product::get();

        return view('welcome' , compact('products' , 'setting'));
    }

    public function dashBoard(){

        $setting = Setting::first();

        $products = Product::get();

        return view('welcome' , compact('products' , 'setting'));


    }
}
