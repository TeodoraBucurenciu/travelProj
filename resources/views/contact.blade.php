<!-- resources/views/contact.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container-fluid text-center" style="margin: 0; padding: 0; background-image: url('{{ asset('images/back3.png') }}'); background-size: cover; background-position: center; height: 100vh; display: flex; flex-direction: column; justify-content: center; color: black;">
        <h2 style="margin: 0; padding: 3;">Contact Us</h2>
        <p>Thank you for your interest in reaching out to us. We appreciate your feedback and inquiries.</p>
        <p>You can contact us through the following methods:</p>
        <ul style="list-style-type: none; padding: 0;">
            <li><strong>Email:</strong> contact@example.com</li>
            <li><strong>Phone:</strong> +123 456 789</li>
        </ul>
        <p>Alternatively, you can use the contact form below to send us a message:</p>
       <!-- Contact Form -->
    </div>
@endsection