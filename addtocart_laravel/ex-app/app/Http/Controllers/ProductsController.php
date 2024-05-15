<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
function product()
{
  $products =  Products::all();
    return view('products',compact('products'));
}

function add_to_cart($id)
{
   $products = Products::findOrFail($id);

 $cart =  session()->get('cart',[]);

 if(isset($cart[$id]))
    {
        $cart[$id]['quantity']++ ;
    }
    else
    {
        $cart[$id] = [
'product_name' => $products->product_name,
'product_desc'=> $products->product_desc,
'picture'=> $products->picture,
'price'=> $products->price,
'quantity'=>1
        ]  ;
    }
     session()->put('cart',$cart);
     return redirect()->back()->with('success','product added...!');

}
}
