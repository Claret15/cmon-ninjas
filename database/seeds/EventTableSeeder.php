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

        // Create 6 specific events 
        App\Models\Event::create(
        [
            'name' => 'The First Dragoon',
            'event_type_id' => 2,
            'event_date' => '2018-10-11',
        ]
        );

        App\Models\Event::create(
            [
                'name' => 'The Arena',
                'event_type_id' => 3,
                'event_date' => '2018-10-18'
            ]
        );

        App\Models\Event::create(
            [
                'name' => 'Fennec Fright Fest',
                'event_type_id' => 1,
                'event_date' => '2018-10-25'
            ]
        );

        App\Models\Event::create(
            [
                'name' => 'The Doomed Mine Of The Wendigo',
                'event_type_id' => 2,
                'event_date' => '2018-11-01'
            ]
        );

        App\Models\Event::create(
            [
                'name' => 'Night Of The Occult',
                'event_type_id' => 1,
                'event_date' => '2018-11-08'
            ]
        );

        App\Models\Event::create(
            [
                'name' => 'Sweet Vengence',
                'event_type_id' => 2,
                'event_date' => '2018-11-17'
            ]
        );

        App\Models\Event::create(
            [
                'name' => 'Lightning Deals Week',
                'event_type_id' => 1,
                'event_date' => '2018-11-22'
            ]
        );

    }
}
