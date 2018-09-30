<?php

use Illuminate\Database\Seeder;

class GuildTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // This originaly seeded the guild table. 
        // factory(App\Models\Guild::class, 10)->create();


        // This is the revised seed. 
        // Creates 10 guilds
        // Then created 30 players for each guild
        // Then created 3 eventstats for each player.  
        // Works perfectly.  
        // Need to adjust the duplicate players, stats and players. Unique contraints?
        factory(App\Models\Guild::class, 10)->create()->each(function ($players) {
            $players->player()->saveMany(factory(App\Models\Player::class, 30)->create())->each(function ($eventStat) {
                $eventStat->eventstat()->saveMany(factory(App\Models\EventStat::class, 3)->create());
            });
        });
    }
}
