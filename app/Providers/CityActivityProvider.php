<?php
// CityActivityProvider.php
namespace App\Providers;

use Faker\Generator as FakerGenerator; // Ensure correct import

class CityActivityProvider extends \Faker\Provider\Base
{
    protected $faker;

    public function __construct(FakerGenerator $faker)
    {
        parent::__construct($faker);
    }
    public function cityActivity()
    {
        // You can customize this method to generate activity names related to cities
        $activities = [
            'Exploring ' . $this->generator->city,
            'Sightseeing in ' . $this->generator->city,
            'Hiking near ' . $this->generator->city,
            'Visit to ' . $this->generator->city . ' Museum',
            'Dining in Local Restaurants of ' . $this->generator->city,
            'Photography tour in ' . $this->generator->city,
            'Attend a cultural event in ' . $this->generator->city,
            'Day trip to nearby attractions from ' . $this->generator->city,
            'Shopping spree in ' . $this->generator->city,
            'Relaxing day at a spa in ' . $this->generator->city,
            // Add more activity name variations as needed
        ];

        return [
            'activity_name' => $this->generator->word,
            // Other fields...
        ];
    }
}

