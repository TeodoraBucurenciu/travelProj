<!-- resources/views/account.blade.php -->

@extends('layouts.app') {{-- Assuming you have a common layout for your app --}}

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">My Account</div>

                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <strong>Name:</strong>
                                    <p>{{ Auth::user()->name }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <strong>Email:</strong>
                                    <p>{{ Auth::user()->email }}</p>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#editEmailModal">Edit Email</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
