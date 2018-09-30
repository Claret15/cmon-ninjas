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

        // Revised Seeder file. 
        // PlayerTableSeeder was not run.
        // GuildTableSeeder was postioned as the last file. 
        // This file created the guild table, then created players for each guild, 
        // then created stats for each player.  All from the GuildTableSeeder

        // Order of seeding is important
        Model::unguard();
        
        $this->call(LeagueTableSeeder::class);
        $this->call(EventTypeTableSeeder::class);
        $this->call(EventTableSeeder::class);
        $this->call(GuildTableSeeder::class);
        // Players Table has foreign keys with the above tables
        // These needs to be seeded first before Players Table can be seeded.  
        // $this->call(PlayerTableSeeder::class);
        
        // $this->call(EventStatTableSeeder::class);
        Model::reguard();
    }
}


/*

    // This was the original structure. 

        Model::unguard();
        
        $this->call(GuildTableSeeder::class);       
        $this->call(LeagueTableSeeder::class);
        $this->call(EventTypeTableSeeder::class);
        $this->call(EventTableSeeder::class);

        // Players Table has foreign keys with the above tables
        // These needs to be seeded first before Players Table can be seeded.  
        $this->call(PlayerTableSeeder::class);
        

        // This was not used since, I had arrange for playerTableSeeder to automatically 
        // create records for the EventStats
        // $this->call(EventStatTableSeeder::class);  
        
        Model::reguard();

*/