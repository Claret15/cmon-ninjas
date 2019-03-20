<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        // These needs to be seeded first before Members Table can be seeded.
        $this->call(LeagueTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(EventTypeTableSeeder::class);
        $this->call(EventTableSeeder::class);
        $this->call(GuildTableSeeder::class);

        //See Members Table
        $this->call(AddMembersSeeder::class);

        // Seed Event_Stats Table
        $this->call(EventStatTableSeeder::class);

        Model::reguard();
    }
}
