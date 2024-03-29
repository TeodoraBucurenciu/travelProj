<!-- resources/views/trip/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Activity Details</h2>

    <div class="row">
        <!-- Left Part: Picture and Name -->
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset($activity->photo_url) }}" class="card-img-top img-fluid" alt="{{ $activity->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $activity->name }}</h5>
                </div>
            </div>
        </div>

        <!-- Right Part: Details, Dates, and Button -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    {{$activity->name}}
                                    <span class="float-right">{{$activity->amount_with_currency}}</span>
                                </div>
                                <div class="card-body">
                                    <p>{!! $activity->description !!}</p>
                                </div>
                                <div class="card-footer">
                                    <!-- Pass both the activity ID and quantity to the cart route -->
                                    <form action="{{ route('cart') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $activity->id }}">
                                        <input type="hidden" name="quantity" value="1">
                                        <button type="submit" class="btn btn-success btn-block">Add To Cart</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection