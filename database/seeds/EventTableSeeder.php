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
                'name' => 'The Divinity of Champions',
                'event_type_id' => 2,
                'event_date' => '2018-8-16'
            ]
        );

        factory(App\Models\Event::class)->create(
            [
                'name' => 'Neon Dissent',
                'event_type_id' => 1,
                'event_date' => '2018-8-23'
            ]
        );

        factory(App\Models\Event::class)->create(
            [
                'name' => 'War in the Wasteland',
                'event_type_id' => 2,
                'event_date' => '2018-8-30'
            ]
        );

        factory(App\Models\Event::class)->create(
            [
                'name' => 'Grove of the Titans',
                'event_type_id' => 1,
                'event_date' => '2018-9-06'
            ]
        );
    }
}
