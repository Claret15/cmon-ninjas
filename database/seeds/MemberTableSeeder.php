<?php

use Illuminate\Database\Seeder;

class MemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // For each guild that has been created, create 30 members. 
        $guild = DB::table('guilds')->pluck('id');
            
        foreach ($guild as $guild)
            factory(App\Models\Member::class, 30)->create(
                [
                    'guild_id' => $guild,
                ]
            );
    } 
}
