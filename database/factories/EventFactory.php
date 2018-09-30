<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Event::class, function (Faker $faker) {
    $eventTypeId = App\Models\EventType::pluck('id')->toArray();
    
    return [
        'name' => $faker->sentence($nbWords = 4, $variableNbWords = true),
        'event_type_id' => $faker->randomElement($eventTypeId),
        'event_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
    ];
});
