<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\City;
use App\Models\Activity;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::factory(100)->create();

        City::truncate();
        City::factory(100)->create();

        Activity::truncate();
        Activity::factory(100)->create();
    }
}
