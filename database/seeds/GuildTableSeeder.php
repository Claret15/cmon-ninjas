<?php

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
        factory(App\Models\Guild::class)->create([
            'name'=>'Ninjas Guild'
        ]);
        // factory(App\Models\Guild::class)->create([
        //     'name' => 'Infernal Pathfinders',
        // ]);

        // factory(App\Models\Guild::class, 8)->create();
    }
}
