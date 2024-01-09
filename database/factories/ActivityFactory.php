<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Activity;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activity>
 */
class ActivityFactory extends Factory
{
    public function definition()
    {
        // Example usage in a seeder or controller
        $faker = Faker::create();
        $name = $faker->unique()->randomElement([
            'Exploring the City Center',
            'Sightseeing Tour',
            'Visiting Local Museums',
            'City Park Picnic',
            'Shopping Spree in Downtown',
            'Attending a Cultural Event',
            'Dining in Local Restaurants',
            'City Photography Tour',
            'Hiking in Nearby Trails',
            'Relaxing Spa Day in the City',
        ]);

        return [
        'name' => $name,
        'description' => $faker->sentence,
        'quantity' => $faker->numberBetween(1,10),
        'price' => $faker->randomFloat(2, 10, 100)
    ];
    }

   
}
