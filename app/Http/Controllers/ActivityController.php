<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\CartItem;

class ActivityController extends Controller
{
    public function index()
    {
        $activity = Activity::all()->shuffle()->take(5);

        return view('activity', ['searchProduct' => $activity]);
    }

    public function search(Request $request)
    {

        if($request->search){

            $searchResults = Activity::where('name', 'like', '%'.$request->search.'%')->latest()->paginate(15);

            return view('search', ['searchProduct' => $searchResults]);
        }else {

            return redirect()->back()->with('message','Empty Search');
        }
        // Perform a search query based on the city name
       
    }

    public function show($id)
{
    $activity = Activity::find($id);

    // Check if $activity is not null
    if (!$activity) {
        abort(404); // or handle the case where the activity is not found
    }

    // Assign a fake price to the activity
    $activity->fake_price = 100; // You can replace this with a dynamic or random value

    $startDate = now()->format('Y-m-d');
    $endDate = now()->addYear()->format('Y-m-d');

    return view('activity.show', compact('activity', 'startDate', 'endDate'));
}

    public function addToCart(Request $request, $activityId)
    {
        // Retrieve the activity details based on $activityId
        $activity = Activity::find($activityId);
    
        // Validate the request
        $request->validate([
            'start_date' => 'required|date',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0', // Add validation for price
            // Add other validation rules as needed
        ]);
    
        // Add the activity to the cart
        $cartItem = new CartItem([
            'name' => $activity->name,
            'start_date' => $request->start_date,
            'quantity' => $request->input('quantity', 1),
            'price' => $request->price, // Use the price from the form
            // Add other fields as needed
        ]);
    
        // Save the cart item to the database
        $cartItem->save();
    
        // Redirect or return a response as needed
        return redirect()->route('cart')->with('success', 'Activity added to cart successfully.');
    }
    

}
