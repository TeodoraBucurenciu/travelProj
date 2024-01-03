<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfirmationController extends Controller
{
    public function show()
    {
        // Mock data for demonstration purposes
        $orderNumber = '12345';
        $orderTotal = 50.00;
        $email = 'user@example.com';

        return view('confirmation.page', compact('orderNumber', 'orderTotal', 'email'));
    }
}
