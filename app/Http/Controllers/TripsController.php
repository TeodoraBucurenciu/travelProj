<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TripsController extends Controller
{
    public function index()
    {
        return view('trips');
    }

    public function showTrips()
    {
        $imageURL = asset('images/back5.png');
        return view('trips',compact('imageURL'));
    }
}