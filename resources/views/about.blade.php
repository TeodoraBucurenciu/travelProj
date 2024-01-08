@extends('layouts.app')

@section('title')
Laravel Programming Lab. | About Page
@endsection

@section('content')
<div class="container-fluid text-center" style="margin: 0; padding: 0; background-image: url('{{ asset('images/back4.png') }}'); background-size: cover; background-position: center; height: 100vh; display: flex; flex-direction: column; justify-content: center; color: black; padding-left: 10px;">
        <p class="text-md-left text-lg-left text-xl-left">Welcome to WorldWide, your gateway to unforgettable travel experiences! No matter where your travels take you, WorldWide offers the best way to connect with your destination.</p>
        <p class="text-md-left text-lg-left text-xl-left">Make memories all over the globe with our locally-vetted, expertly-curated experiences. From must-see iconic attractions to unexpected under-the-radar gems, we have something for everyone.</p>

        <h3 class="text-md-left text-lg-left text-xl-left">Maximize Your Trip</h3>
        <p class="text-md-left text-lg-left text-xl-left">We take the stress out of trip planning. Access everything in our app so you can focus on enjoying the moment, not taking care of logistics. Explore what you want to do, then count on our flexible policies and 24/7, multilingual customer support whenever you need.</p>

        <h3 class="text-md-left text-lg-left text-xl-left">Find the Best Sights</h3>
        <p class="text-md-left text-lg-left text-xl-left">Choose from over 118,000 experiences in 150 countries, including hard-to-book attractions and easy-to-miss surprises. With insights from like-minded travelers and millions of verified reviews, you’ll find the tips and insights you need to have an unforgettable experience.</p>

        <blockquote>
            <p class="text-md-left text-lg-left text-xl-left">“The food was delicious, but learning about the neighborhood from our passionate guide really made this tour unforgettable. - Will | Amsterdam: Authentic Food Tasting Tour of Jordaan”</p>
        </blockquote>

        <h3 class="text-md-left text-lg-left text-xl-left">Plan Ahead or Be Spontaneous</h3>
        <p class="text-md-left text-lg-left text-xl-left">We’ve sold over 120 million tickets to the world’s travelers. From last-minute decisions to months-in-advance planning, you can travel how you need. Book in advance when you can, and even if your plans change, enjoy free cancellation up to 24 hours in advance, no questions asked.</p>

        <h3 class="text-md-left text-lg-left text-xl-left">Originals by WorldWide</h3>
        <p class="text-md-left text-lg-left text-xl-left">Experience the world more deeply with Originals by WorldWide, a collection of our most immersive and unforgettable experiences yet. Unlock the door to the Sistine Chapel before anyone else is allowed inside, dig into hidden restaurants on a tour led by your favorite Instagram foodie, or step onto the playing field and behind the scenes with sports legends.</p>
</div>
@endsection