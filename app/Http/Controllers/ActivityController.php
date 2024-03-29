<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Http\Controllers\Controller;


class ActivityController extends Controller
{
    public function index()
    {  
        $activity = Activity::all()->shuffle()->take(5);

        return view('activity', ['searchProduct' => $activity]);
    }

    public function activityCart()
    {
        return view('cart');
    }

    public function addActivitytoCart($id)
    {
        $activity = Activity::findOrFail($id);
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $activity->name,
                "quantity" => 1,
                "price" => $activity->price,
                "image" => $activity->image
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'activity has been added to cart!');
    }
     
    public function updateCart(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'activity added to cart.');
        }
    }
   
    public function deleteactivity(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'activity successfully deleted.');
        }
    }
    public function search(Request $request)
    {

        if ($request->search) {

            $searchResults = Activity::where('name', 'like', '%' . $request->search . '%')->latest()->paginate(15);

            return view('search', ['searchactivity' => $searchResults]);
        } else {

            return redirect()->back()->with('message', 'Empty Search');
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

    public function addToCart(Activity $activity)
    {
        $cart = session()->get('cart');
        if (!$cart) {
            $cart = [$activity->id => $this->sessionData($activity)];
            return $this->setSessionAndReturnResponse($cart);
        }
        if (isset($cart[$activity->id])) {
            $cart[$activity->id]['quantity']++;
            return $this->setSessionAndReturnResponse($cart);
        }
        $cart[$activity->id] = $this->sessionData($activity);
        return redirect()->route('cart.index');
    }

    public function changeQty(Request $request, Activity $activity)
    {
        $cart = session()->get('cart');
        if ($request->change_to === 'down') {
            if (isset($cart[$activity->id])) {
                if ($cart[$activity->id]['quantity'] > 1) {
                    $cart[$activity->id]['quantity']--;
                    return $this->setSessionAndReturnResponse($cart);
                } else {
                    return $this->removeFromCart($activity->id);
                }
            }
        } else {
            if (isset($cart[$activity->id])) {
                $cart[$activity->id]['quantity']++;
                return $this->setSessionAndReturnResponse($cart);
            }
        }

        return back();
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('success', "Removed from Cart");
    }

    protected function sessionData(Activity $activity)
    {
        return [
            'name' => $activity->name,
            'quantity' => 1,
            'price' => $activity->price,
            'image' => $activity->image
        ];
    }

    protected function setSessionAndReturnResponse($cart)
    {
        session()->put('cart', $cart);
        return redirect()->route('cart')->with('success', "Added to Cart");
    }
}
