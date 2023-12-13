<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AccountController extends Controller
{
    public function index()
    {
        return view('account');
    }

    public function updateEmail(Request $request)
    {
        $request->validate([
            'new_email' => 'required|email|unique:users,email',
        ]);

        $user = auth()->user();
        $user->email = $request->input('new_email');
        $user->save();

        return redirect()->route('account')->with('success', 'Email updated successfully!');
    }
}
