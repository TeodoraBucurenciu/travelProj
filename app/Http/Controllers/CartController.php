<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;

class CartController extends Controller
{
    public function index()
    {
        // Retrieve cart items from the database
        $cartItems = CartItem::all();
        $cartItemCount = $cartItems->count();

        return view('cart', ['cartItems' => $cartItems, 'cartItemCount' => $cartItemCount]);
    }

    public function show()
    {
        $cartItems = CartItem::all();

        // Calculate total price
        $totalPrice = 0;
        foreach ($cartItems as $cartItem) {
            $totalPrice += $cartItem->calculateTotal();
        }

        return view('cart', [
            'cartItems' => $cartItems,
            'totalPrice' => $totalPrice,
        ]);
    }

    public function delete(Request $request, $id)
    {
        // Get the item details before removing it
        $itemToDelete = CartItem::find($id);

        if (!$itemToDelete) {
            return response()->json(['success' => false, 'message' => 'Item not found.']);
        }

        // Delete the item from the database
        $itemToDelete->delete();

        // Remove the item from the session (if applicable)
        // Update this part based on how your cart items are stored

        return response()->json(['success' => true, 'message' => 'Item deleted successfully.']);
    }
    
    
}
