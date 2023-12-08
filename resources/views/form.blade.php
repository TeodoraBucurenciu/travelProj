<!-- resources/views/contact/form.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Contact Us</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ url('/form') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="name">Your Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Your Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" class="form-control" rows="5" required></textarea>
        </div>

        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
