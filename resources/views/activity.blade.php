@extends('layouts.app')

@section('content')
<div class="container-fluid" style="margin: 0; padding: 0; background-image: url('{{ asset('images/back9.png') }}'); background-size: cover; background-position: center; height: 100vh;">

    <div class="row justify-content-center">
        @php
            $randomActivities = \App\Models\Activity::all()->shuffle()->take(5);
        @endphp

        @foreach ($randomActivities as $activity)
        <div class="col-md-3 col-6 mb-4">
            <div class="card">
                <img src="{{ asset('images/activity.jpeg') }}" class="card-img-top"/>
                <div class="card-body">
                    <h4 class="card-title">{{ $activity->name }}</h4>
                    <p>{{ $activity->author }}</p>
                    <p class="card-text"><strong>Price: </strong> ${{ $activity->price }}</p>
                    <p class="btn-holder"><a href="{{ route('addactivity.to.cart', $activity->id) }}" class="btn btn-outline-danger">Add to cart</a> </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
