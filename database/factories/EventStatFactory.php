<?php

use Faker\Generator as Faker;

$factory->define(App\Models\EventStat::class, function (Faker $faker) {
    $eventId = App\Models\Event::pluck('id')->toArray();
    $memberId = App\Models\Member::pluck('id')->toArray();
    $leagueId = App\Models\League::pluck('id')->toArray();

    return [
        'event_id' => $faker->randomElement($eventId),
        'member_id' => $faker->randomElement($memberId),
        'guild_pts' => $faker->numberBetween($min = 100000, $max = Null), 
        'solo_pts' => $faker->numberBetween($min = 100000, $max = Null), 
        'league_id' => $faker->randomElement($leagueId),
        'solo_rank' => $faker->numberBetween($min = 1, $max = 20000),
        'global_rank' => $faker->numberBetween($min = 1, $max = 50000),  
    ];
});
