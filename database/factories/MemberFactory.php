<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/


$factory->define(App\Models\Member::class, function (Faker $faker) {
    
    return [
        'name' => $faker->userName,
        // 'guild_id' => $faker->randomElement($guild),  // allocate a defined guild
        // This will be overridden by the PlayerTableSeeder
    ];
});

