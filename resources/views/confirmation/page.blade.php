<!-- resources/views/confirmation/page.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Payment Confirmation</h2>
        <p>Thank you for your purchase! Your payment has been successfully processed.</p>

        <!-- Display order details or any other relevant information -->
        <div>
            <strong>Order Number:</strong> {{ $orderNumber }}
        </div>
        <div>
            <strong>Order Total:</strong> ${{ number_format($orderTotal, 2) }}
        </div>
        <div>
            <strong>Email:</strong> {{ $email }}
        </div>

        <!-- Add any additional content or styling as needed -->
    </div>
@endsection
