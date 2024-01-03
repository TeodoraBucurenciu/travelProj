<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(100)->create();

        \App\Models\City::truncate();
        \App\Models\City::factory(100)->create();

        \App\Models\Activity::factory(1000)->create();

        
        
    }
}
