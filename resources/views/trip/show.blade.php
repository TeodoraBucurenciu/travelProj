<!-- resources/views/trip/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Trip Details</h2>

        <div class="row">
            <!-- Left Part: Picture and Name -->
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset($trip->photo_url) }}" class="card-img-top img-fluid" alt="{{ $trip->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $trip->name }}</h5>
                        <!-- Add to Cart Button -->
                        <form action="{{ route('cart.addToCart') }}" method="POST">
                            @csrf
                            <input type="hidden" name="name" value="{{ $trip->name }}">
                            <input type="hidden" name="start_date" value="{{ $startDate }}">
                            <button type="submit" class="btn btn-success">Add to Cart</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Right Part: Details, Dates, and Button -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Input field for the datepicker -->
                                <div class="input-group date" data-provide="datepicker">
                                    <input type="text" class="form-control" placeholder="Select Date" id="datepicker"
                                           data-date-start-date="{{ $startDate }}" data-date-end-date="{{ $endDate }}">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Additional details about the trip can go here -->

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include the script to initialize the datepicker -->
    <script>
        $(document).ready(function(){
            // Initialize the datepicker
            $('#datepicker').datepicker({
                startDate: '{{ $startDate }}',
                endDate: '{{ $endDate }}',
                beforeShowDay: function(date) {
                    var currentDate = moment(date).format('YYYY-MM-DD');
                    return [true, '', currentDate >= '{{ $startDate }}' && currentDate <= '{{ $endDate }}'];
                }
            });
        });
    </script>
@endsection
