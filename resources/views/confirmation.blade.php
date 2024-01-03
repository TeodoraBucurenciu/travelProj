<!-- resources/views/checkout-confirmation.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Order Confirmation</h2>

        <p>Thank you for your purchase! Your order details are:</p>

        <ul>
            <li><strong>Order Number:</strong> {{ $orderNumber }}</li>
            <li><strong>Order Total:</strong> ${{ $orderTotal }}</li>
            <!-- Add other order details as needed -->
        </ul>

        <p>We have sent an email confirmation to {{ $email }}.</p>

        <!-- You can include additional information or links here -->

        <a href="{{ route('home') }}" class="btn btn-primary">Continue Shopping</a>
    </div>
@endsection
