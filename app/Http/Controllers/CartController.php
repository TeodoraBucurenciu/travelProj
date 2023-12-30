<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
use Carbon\Carbon;

class CartController extends Controller
{
    public function index()
    {
        // Retrieve cart items from the database
        $cartItems = CartItem::all();
        $cartItemCount = $cartItems->count();

        return view('cart', ['cartItems' => $cartItems, 'cartItemCount' => $cartItemCount]);
    }

    public function delete(Request $request, $id)
    {
        // Find the cart item by ID and delete it
        $cartItem = CartItem::find($id);

        if ($cartItem) {
            $cartItem->delete();
        }

        return redirect()->route('cart.index')->with('message', 'Item deleted successfully');
    }

    public function addToCart(Request $request)
{
    $startDate = Carbon::createFromFormat('m/d/Y', $request->input('start_date'))->format('Y-m-d');

    // Create the cart item
    $cartItem = CartItem::create([
        'name' => $request->input('name'),
        'start_date' => $startDate,
        // Add other fields as needed
    ]);

    // Perform any additional logic, such as associating the item with a user, etc.

    return redirect()->route('cart.index')->with('message', 'Item added to the cart successfully');
}
}
