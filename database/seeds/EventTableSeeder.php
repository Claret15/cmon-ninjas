<?php

use App\Models\Event;
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

        // Create 6 specific events
        Event::create(
            [
                'name' => 'The First Dragoon',
                'event_type_id' => 2,
                'event_date' => '2018-10-11',
            ]
        );

        Event::create(
            [
                'name' => 'The Arena',
                'event_type_id' => 3,
                'event_date' => '2018-10-18',
            ]
        );

        Event::create(
            [
                'name' => 'Fennec Fright Fest',
                'event_type_id' => 1,
                'event_date' => '2018-10-25',
            ]
        );

        Event::create(
            [
                'name' => 'The Doomed Mine Of The Wendigo',
                'event_type_id' => 2,
                'event_date' => '2018-11-01',
            ]
        );

        Event::create(
            [
                'name' => 'Night Of The Occult',
                'event_type_id' => 1,
                'event_date' => '2018-11-08',
            ]
        );

        Event::create(
            [
                'name' => 'Sweet Vengence',
                'event_type_id' => 2,
                'event_date' => '2018-11-17',
            ]
        );

        Event::create(
            [
                'name' => 'Lightning Deals Week',
                'event_type_id' => 1,
                'event_date' => '2018-11-22',
            ]
        );
    }
}
