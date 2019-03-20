<?php

use App\Models\League;
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
        League::create(['name' => 'Legends']);
        League::create(['name' => 'Emperors']);
        League::create(['name' => 'Kings']);
        League::create(['name' => 'Paladins']);
        League::create(['name' => 'Knights']);
        League::create(['name' => 'Squires']);
        League::create(['name' => 'Soldiers']);
    }
}
