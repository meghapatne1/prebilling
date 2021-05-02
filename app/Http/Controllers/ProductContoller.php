<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use DB;
use Auth;


class ProductContoller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function saveproduct(Request $request)
    {
        $product_data = $request['pro_price'];
        $count=Array();
        foreach ($product_data as $key => $val) {
            $product = new Product;
            $product->pro_price = $request['pro_price'][$key];
            $product->pro_name = $request['pro_name'][$key];
            $product->pro_unit = $request['pro_unit'][$key];
            $user = Auth::user();
            $product->user_mobile = $user->mobile;
            $product->user_name =  $user->name;
            $product->save();
            $count[]=$product;
        }
         $productcount = count($count);
        return redirect()->route('add_customers_info')->with('success','You have successfully added your ' .$productcount. ' products now please add your customer.');
    }
    
 


    


}
