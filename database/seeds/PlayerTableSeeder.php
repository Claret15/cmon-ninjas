<?php

use Illuminate\Database\Seeder;

class PlayerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // This was the original seed
        // factory(App\Models\Player::class, 10)->create();

        // Revised seed to populate 30 players and 3 eventstats for each player
        // This was then commented out as these would be seeded automatically form the GuildTableSeeder
        // factory(App\Models\Player::class, 30)->create()->each(function ($eventStat) {
        //         $eventStat->eventstat()->saveMany(factory(App\Models\EventStat::class, 3)->create());
        //     });

    }
}
