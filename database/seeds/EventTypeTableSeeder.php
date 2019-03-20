<?php

use App\Models\EventType;
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
        EventType::create(['name' => 'Raid']);
        EventType::create(['name' => 'Crusade']);
        EventType::create(['name' => 'Arena']);
    }
}
