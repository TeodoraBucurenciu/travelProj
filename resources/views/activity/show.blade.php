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
                            @foreach($activity as $activity)
                            <div class="card">
                                <div class="card-header">
                                    {{$activity->name}}
                                    <span class="float-right">{{$activity->amount_with_currency}}</span>
                                </div>
                                <div class="card-body">
                                    <p>{!! $activity->description !!}</p>
                                </div>
                                <div class="card-footer">
                                    <a href="{{route('add-cart', [$activity->id])}}" class="btn btn-success btn-block">Add To Cart</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>


            @endsection