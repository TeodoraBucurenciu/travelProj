@extends('layouts.app')

@section('content')
<div class="container-fluid" style="margin: 0; padding: 0; background-image: url('{{ asset('images/back9.png') }}'); background-size: cover; background-position: center; height: 100vh;">

    <div class="row justify-content-center">
        @php
            $randomActivities = \App\Models\Activity::all()->shuffle()->take(5);
        @endphp

        @foreach ($randomActivities as $activity)
            <div class="col-md-4 mb-4">
                <div class="card" style="width: 100%; max-width: 300px; margin: 0 auto;">
                    <a href="{{ route('activity.show', ['id' => $activity->id]) }}">
                        <img src="{{ asset($activity->photo_url) }}" class="card-img-top img-fluid" alt="{{ $activity->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $activity->name }}</h5>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
