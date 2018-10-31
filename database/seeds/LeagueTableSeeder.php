<?php

use Illuminate\Database\Seeder;

class LeagueTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        // If you want to add specific data, you need to add it here. 

        // \App\Models\League::truncate();
        \App\Models\League::create(['name' => 'Legends']);
        \App\Models\League::create(['name' => 'Emperors']);
        \App\Models\League::create(['name' => 'Kings']);
        \App\Models\League::create(['name' => 'Paladins']);
        \App\Models\League::create(['name' => 'Knights']);
        \App\Models\League::create(['name' => 'Squires']);

        // This is to use the Model Factory to input fake data
            // factory(App\Models\League::class, 2)->create();

    }
}
