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
        $member = DB::table('members')->pluck('id');

        foreach ($event as $event){
            $member = DB::table('members')->pluck('id');
            foreach ($member as $member){
                factory(App\Models\EventStat::class)->create(
                    [
                        'event_id' => $event,
                        'member_id' => $member,
                    ]
                );
            };  
        };
    }
}
