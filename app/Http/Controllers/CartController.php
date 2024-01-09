<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;

class CartController extends Controller
{
    public function index(Request $request)
    {
        
        $cartItems = CartItem::all();
        $cartItemCount = $cartItems->count();

        return view('cart', ['cartItems' => $cartItems, 'cartItemCount' => $cartItemCount]);
    }

 
   
    
    
}
