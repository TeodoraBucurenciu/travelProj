<!-- resources/views/process-payment-confirmation.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Order Confirmation</h2>
        <p>Order Number: {{ $orderNumber }}</p>
        <p>Total Amount: ${{ $orderTotal }}</p>
        <p>Email: {{ $email }}</p>
        <!-- Add more details as needed -->
    </div>
@endsection
