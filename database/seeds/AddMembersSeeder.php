<?php

use Illuminate\Database\Seeder;

class AddMembersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $members = [
            'b(U)dv',
            'Bailiff Geoffrey Minra',
            'Bard Alla Drift',
            'Baron Ralf The Wise',
            'Bruin',
            'Claret Spilla',
            'CliK',
            'Dis My World',
            'Doomdefender',
            'Elfa Orion',
            'Eloara',
            'Fierus Magnus',
            'figgy73',
            'goldfish247 365',
            'Grand Master Jason',
            'icks',
            'Judge Alice III',
            'King Minotaur',
            'Knight Richard Hugh XXXV',
            'Lady Mandu',
            'Laserdwarf2',
            'Master Alpais Ruby',
            'mustardgas69',
            'Reverend Raistlin Majer',
            'RockeroFidel 2',
            'Rostaman',
            'SchadOw',
            'Serf Ibrahim Onxy',
            'SolTkr',
            'Spartan Jones',
            'Squire Abitha VII',
            'Sultan Garel Diamond',
            'swavrick',
            'Tdubb',
            'Tzar Maha Black'
        ];


        foreach ($members as $member) {
            App\Models\Member::create(
                [
                    'name' => $member,
                    'guild_id' => 1
                ]
            );
        }
    }
}
