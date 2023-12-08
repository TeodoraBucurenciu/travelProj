<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\City;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $cityName = $this->faker->city;

        return [
            'name' => $cityName,
            'photo_url' => $this->getCityPhotoUrl($cityName),
        ];
    }

    /**
     * Generate a photo URL based on the city name.
     *
     * @param string $cityName
     * @return string
     */
    private function getCityPhotoUrl($cityName)
    {
        // Assuming you have city photos with filenames matching the city names
        return "https://source.unsplash.com/400x300/?$cityName";
    }
}
