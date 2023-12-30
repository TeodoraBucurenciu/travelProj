<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use Carbon\Carbon;

class TripsController extends Controller
{
    public function index()
    {
        $cities = City::all()->shuffle()->take(5);

        return view('trips', ['searchProduct' => $cities]);
    }

    public function search(Request $request)
    {

        if($request->search){

            $searchResults = City::where('name', 'like', '%'.$request->search.'%')->latest()->paginate(15);

            return view('search', ['searchProduct' => $searchResults]);
        }else {

            return redirect()->back()->with('message','Empty Search');
        }
        // Perform a search query based on the city name
       
    }

    public function show($id)
    {
        $trip =City::find($id);

        if(!$trip){
            abort(404);
        }

       // Pass start and end dates to the view
       $startDate = Carbon::parse($trip->start_date)->format('m/d/Y');
       $endDate = Carbon::parse($trip->end_date)->format('m/d/Y');

       return view('trip.show', [
           'trip' => $trip,
           'startDate' => $startDate,
           'endDate' => $endDate,
       ]);
    }

    
  
    
}