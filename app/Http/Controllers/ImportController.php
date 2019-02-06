<?php

namespace App\Http\Controllers;

use App\Http\Requests\CsvImportRequest;
use App\Models\EventStat;
use App\Models\League;
use App\Models\Member;

class ImportController extends Controller
{
    public function importEventStatsCrusade(CsvImportRequest $request)
    {
        $path = $request->file('csv')->getRealPath();
        $csv_data = array_map('str_getcsv', file($path));
        $data = array_slice($csv_data, 1);

        foreach ($data as $row) {

            $member = Member::where('name', $row[1])->first();
            $league = League::where('name', $row[4])->first();

            $eventStat = new EventStat;
            $eventStat->event_id = $row[0];
            $eventStat->member_id = $member['id'];
            $eventStat->guild_pts = $row[2];
            $eventStat->solo_pts = $row[2];
            $eventStat->position = $row[3];
            $eventStat->league_id = $league['id'];
            $eventStat->solo_rank = $row[5];
            $eventStat->global_rank = $row[6];

            $eventStat->save();
        }

        return redirect('/dashboard')->with('success', 'Crusade Event Stats uploaded!');

    }

    public function importEventStatsRaid(CsvImportRequest $request)
    {
        $path = $request->file('csv')->getRealPath();
        $csv_data = array_map('str_getcsv', file($path));
        $data = array_slice($csv_data, 1);

        foreach ($data as $row) {
            $member = Member::where('name', $row[1])->first();
            $league = League::where('name', $row[5])->first();

            $eventStat = new EventStat;
            $eventStat->event_id = $row[0];
            $eventStat->member_id = $member['id'];
            $eventStat->guild_pts = $row[2];
            $eventStat->position = $row[3];
            $eventStat->solo_pts = $row[4];
            $eventStat->league_id = $league['id'];
            $eventStat->solo_rank = $row[6];
            $eventStat->global_rank = $row[7];

            $eventStat->save();
        }

        return redirect('/dashboard')->with('success', 'Raid Event Stats uploaded!');
    }

    public function importMembers(CsvImportRequest $request)
    {
        // Review code so that keys are referenced correctly in the new array.
        $path = $request->file('csv')->getRealPath();
        $csv_data = array_map('str_getcsv', file($path));
        $data = array_slice($csv_data, 0, 3);
        $keys = array_shift($data);

        foreach ($data as $i => $row) {
            $data[$i] = array_combine($keys, $row);
        }

        foreach ($data as $row) {
            // $eventStat = new EventStat();
            $member = Member::where('name', $row['member_id'])->first();
            $league = League::where('name', $row['league_id'])->first();
            echo $row['member_id'];
            echo "<br>";
            // echo $row['event_id'];
            echo "<br>";
            echo $row['guild_pts'];
            echo "<br>";
            echo $row['position'];
            echo "<br>";
            echo $row['league_id'];
            echo "<br>";
            echo $row['solo_rank'];
            echo "<br>";
            echo $row['global_rank'];
            echo "<br>";
            echo $member->id;
            echo "<br>";
            echo $league->id;
            echo "<br>";
            echo "--------------------------------------------------";
            echo "<br>";
        }

        return view('pages.tests.testimport', compact('data', 'member', 'league'));

    }
}
