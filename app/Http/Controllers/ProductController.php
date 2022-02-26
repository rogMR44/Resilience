<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function classplans(){
        $products = Product::all();
        return view('classplans',compact('products'));
    }

    public function pay(Product $product){
        return view('products.pay',compact('product'));
    }

    public function purchase_success(){
        return redirect()->route('dashboard')->with('message','Credits added successfully');
    }
}
