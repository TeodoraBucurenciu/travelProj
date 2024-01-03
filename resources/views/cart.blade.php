<!-- cart.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Shopping Cart</h2>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Start Date</th>
                    <!-- Add other columns as needed -->
                    <th scope="col">Quantity</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
            @foreach($cartItems as $index => $item)
                <tr>
        <th scope="row">{{ $index + 1 }}</th>
        <td>{{ $item['name'] }}</td>
        <td>{{ $item['start_date'] }}</td>
        <td>
            <!-- Add a form for the delete action -->
            <form action="{{ route('cart.delete', ['id' => $index]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
@endforeach
            </tbody>
        </table>

       
        
        <form action="{{ route('processPayment') }}" method="post" id="payment-form">
        @csrf
        <!-- Add form fields for card information -->
        <div id="card-element"></div>
        <!-- Used to display form errors -->
        <div id="card-errors" role="alert"></div>
        <button id="checkoutButton">Checkout</button>
    </form>
    </div>


    <script>
    $(document).ready(function() {
        var stripe = Stripe('pk_test_51OUISpIRAemRWZSzkD849Xn9eyeZZnG5rGJrVAoO7dUZU3AjwZiQ1vfRyQv261kPFg58s7Q1g44MXepjf35qe5d000XVrgm9gY');

        $('#checkoutButton').click(function() {
            // Perform AJAX request to process payment
            $.ajax({
                type: 'POST',
                url: '{{ route("processPayment") }}',
                data: {/* Include any necessary data for the payment */},
                success: function(response) {
                    // Use response.clientSecret to confirm the payment on the client side
                    handlePaymentConfirmation(response.clientSecret);
                },
                error: function(error) {
                    // Handle errors
                    console.error('Error processing payment:', error.responseJSON.error);
                }
            });
        });

        function handlePaymentConfirmation(clientSecret) {
            // Use Stripe.js to confirm the payment on the client side
            stripe.confirmCardPayment(clientSecret, {
                payment_method: {
                    card: {
                        // Add card details if needed
                    }
                }
            }).then(function(result) {
                if (result.error) {
                    // Handle payment confirmation failure
                    console.error('Payment confirmation failed:', result.error.message);
                } else {
                    // Payment confirmed successfully
                    console.log('Payment confirmed:', result.paymentIntent);
                    // Redirect or show success message as needed
                }
            });
        }
    });
</script>

@endsection