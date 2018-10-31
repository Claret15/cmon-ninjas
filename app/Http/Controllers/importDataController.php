<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class importDataController extends Controller
{


    function importDataFromCsv () {
        /*
        Upload CSV file from Form
        Create Temporary Table. 
        Validate data
        Then copy content to a Temporary Table. 

        $guild = ""
        $guild_id = ""
 
 
        foreach ( $array as $data)

    Step 1: Check if guild exists
            code - guess:
            $guild_id = Guild::where('name', '$data['guild'])->first();

        If not: create a record in Guilds table and set variable to the new guild_id

            if ($guild_id !== $data['guild']){
                $guild =  Guild::create([
                    'name' => $data['name'],
                ]);

                $guild_id = $guild->id; // not sure

            } else {
        If exists then $guild_id variable is assigned with the guild id    

                $guild_id = Guild::where('name', '$data['name'])->findOrFail();
            }
        
    Step 2: Check if Member exists
        $memberName => condition
            
        If not: Create Member in Members Table and set variable to member_id
            
            if (name does not exist name in Member) {
                User::create([
                    'name' => $data['name'],
                ])
            }

            $memberId = .....

        If exists : Get MemberID

    Step 3:  Check if Event exists
    
    Step 4:  Get league Id

            switch statement:
                legend
                king, etc ....

        
    Step 4:  Create the EventStat
            EventStat::create([
                
                all entries....
                
            ])






        */


    }
}
