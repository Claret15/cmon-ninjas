<?php

use Illuminate\Database\Seeder;

class EventStatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // For each event, create event stats for each player in the database
        $event = DB::table('events')->pluck('id');
        $player = DB::table('players')->pluck('id');

        foreach ($event as $event){
            $player = DB::table('players')->pluck('id');
            foreach ($player as $player){
                factory(App\Models\EventStat::class)->create(
                    [
                        'event_id' => $event,
                        'player_id' => $player,
                    ]
                );
            };  
        };
    }
}
