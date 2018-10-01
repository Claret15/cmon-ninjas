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
        // Order of seeding is important
        Model::unguard();
        // These needs to be seeded first before Players Table can be seeded.  
        $this->call(LeagueTableSeeder::class);
        $this->call(EventTypeTableSeeder::class);
        $this->call(EventTableSeeder::class);
        $this->call(GuildTableSeeder::class);
        // Players Table has foreign keys with the above tables
        $this->call(PlayerTableSeeder::class);
        // Event Stats has foreign keys with the above tables.
        $this->call(EventStatTableSeeder::class);
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