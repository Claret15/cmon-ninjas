<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

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
        $this->call(EventTypeTableSeeder::class);
        $this->call(EventTableSeeder::class);
        $this->call(GuildTableSeeder::class);
        $this->call(AddMembersSeeder::class);
        
//  These will only be used during development
        // Members Table has foreign keys with the above tables
        // $this->call(MemberTableSeeder::class);
        // Event Stats has foreign keys with the above tables.
        // $this->call(EventStatTableSeeder::class);
        
        Model::reguard();
    }
}
