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
                               <!-- Input field for the datepicker -->
                               <div class="input-group date" data-provide="datepicker">
    <input type="text" class="form-control" placeholder="Select Date" id="datepicker" name="datepicker">
    <div class="input-group-addon">
        <span class="glyphicon glyphicon-th"></span>
    </div>
</div>


                        
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <form action="{{ route('addtocart', ['activityId' => $activity->id]) }}" method="post">
    @csrf
    <input type="hidden" name="start_date" value="{{ $startDate }}">
    <input type="hidden" name="quantity" value="1">
    <input type="hidden" name="price" value="{{ $activity->fake_price }}">
    <button type="submit" class="btn btn-success">Add to Cart</button>
</form>


                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    $(document).ready(function () {
        // Initialize the datepicker
        $('#datepicker').datepicker({
            startDate: '{{ $startDate }}',
            endDate: '{{ $endDate }}',
            beforeShowDay: function (date) {
                var currentDate = moment(date).format('YYYY-MM-DD');
                return [true, '', currentDate >= '{{ $startDate }}' && currentDate <= '{{ $endDate }}'];
            }
        });

        // Capture selected date and update hidden input
        $('#datepicker').on('changeDate', function (e) {
            var selectedDate = moment(e.date).format('YYYY-MM-DD');
            $('input[name="start_date"]').val(selectedDate);
        });
    });

   
</script>


@endsection
