<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactSubmission;

class ContactController extends Controller
{
    public function index()
{
    return view('contact');
}

public function showContactForm()
{
        return view('form');
}

public function submitForm(Request $request)
{
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Save the form submission to the database
        ContactSubmission::create($validatedData);

        return redirect('/form')->with('success', 'Thank you! Your message has been sent.');
    

    // Handle GET requests for the form
}
}
