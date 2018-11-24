<?php

use Illuminate\Database\Seeder;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Generates 3 Random Events
        // factory(App\Models\Event::class, 3)->create();

        // Create 4 specific events 
        factory(App\Models\Event::class)->create(
        [
            'name' => 'The First Dragoon',
            'event_type_id' => 2,
            'event_date' => '2018-10-11',
        ]
        );

        factory(App\Models\Event::class)->create(
            [
                'name' => 'The Arena',
                'event_type_id' => 3,
                'event_date' => '2018-10-18'
            ]
        );

        factory(App\Models\Event::class)->create(
            [
                'name' => 'Fennec Fright Fest',
                'event_type_id' => 1,
                'event_date' => '2018-10-25'
            ]
        );

        factory(App\Models\Event::class)->create(
            [
                'name' => 'The Doomed Mine Of The Wendigo',
                'event_type_id' => 2,
                'event_date' => '2018-11-01'
            ]
        );

        factory(App\Models\Event::class)->create(
            [
                'name' => 'Night Of The Occult',
                'event_type_id' => 1,
                'event_date' => '2018-11-08'
            ]
        );

        factory(App\Models\Event::class)->create(
            [
                'name' => 'Sweet Vengence',
                'event_type_id' => 2,
                'event_date' => '2018-11-17'
            ]
        );

    }
}
