<?php

use App\Models\EventStat;
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
        $position = 0;

        foreach ($event as $event) {
            $member = DB::table('members')->pluck('id');
            foreach ($member as $member) {
                factory(EventStat::class)->create(
                    [
                        'guild_pts' => mt_rand(1000000, mt_getrandmax()),
                        'position' => $position++,
                        'solo_pts' => mt_rand(1000000, mt_getrandmax()),
                        'solo_rank' => rand(1, 200),
                        'global_rank' => rand(1, 100000),
                        'event_id' => $event,
                        'member_id' => $member,
                        'league_id' => rand(1, 7),
                    ]
                );
            };
        };
    }
}
