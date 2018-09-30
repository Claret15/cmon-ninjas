<?php

use Illuminate\Database\Seeder;

class EventTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Seed specific data to the table. 

        \App\Models\EventType::create(['name' => 'Raid']);
        \App\Models\EventType::create(['name' => 'Crusade']);

        // factory(App\Models\EventType::class, 10)->create();
    }
}
