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


$factory->define(App\Models\Player::class, function (Faker $faker) {
    $guildId = App\Models\Guild::pluck('id')->toArray();
    
    // Decided not to include league in the Player table
    // $leagueId = App\Models\League::pluck('id')->toArray();
    
    return [
        'name' => $faker->userName,
        'guild_id' => $faker->randomElement($guildId),
        // No longer needed
        // 'league_id' => $faker->randomElement($leagueId),
    ];
});

