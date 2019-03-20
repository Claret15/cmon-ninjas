<?php

use App\Models\Guild;
use Illuminate\Database\Seeder;

class GuildTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Guild::create([
            'name' => 'Ninjas',
        ]);
    }
}
