<!-- resources/views/trips.blade.php -->
@extends('layouts.app')

@section('content')
 <div class="container-fluid" style="margin: 0; padding: 0; background-image: url('{{ asset('images/back5.png')}}'); background-size: cover; background-position: center; height: 100vh;">

 <div class="row justify-content-center">
        @php
            $cities = \App\Models\City::all()->shuffle()->take(5);
        @endphp

        @foreach($cities as $city)
            <div class="col-md-4 mb-4">
                <div class="card" style="width: 100%; max-width: 300px; margin: 0 auto;">
                    <img src="{{ asset($city->photo_url) }}" class="card-img-top img-fluid" alt="{{ $city->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $city->name }}</h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>
@endsection

