@extends('layouts.app')

@section('content')

        <div class="container">


            <p><a href="/members" class="btn btn-primary btn-sm"><< Back to members</a></p>
           {{-- {{$members}} --}}
        <h5>$memberGuild:</h5>
           {{$memberGuild}}
           <br>
           {{$memberGuild->name}}
           <br><br>
        <h5>$testOutput:</h5>
           {{$testOutput}}
           <br><br>
        <h5>$allMemberStats:</h5>
           {{$allMemberStats}}
           <br><br>

           <div class="mb-3">
                <table class='table'>
                    <tr>
                        <th>Event</th>
                        <th>Guild Pts</th>
                        <th>Solo Pts</th>
                        <th>League</th>
                        <th>Solo Rank</th>
                        <th>Global Rank</th>
                    </tr>

            @foreach($allMemberStats as $stats)
                    <tr>
                        <td>{{$stats->event->name}}</td>    {{-- Event Name --}}
                        <td>{{$stats->guild_pts}}</td>     {{-- Guild Pts --}}
                        <td>{{$stats->solo_pts}}</td>     {{-- Solo Pts --}}
                        <td>{{$stats->league->name}}</td>     {{-- League --}}
                        <td>{{$stats->solo_rank}}</td>     {{-- Solo Rank --}}    
                        <td>{{$stats->global_rank}}</td>     {{-- Global Rank --}}
                    </tr>
            @endforeach
                </table> 
            </div>

           <br><br>
        {{-- <h5>$allEventStats:</h5>  
           {{$allEventStats}} --}}
           <br><br>
        <h5>$allGuildEventStats:</h5>
           {{-- {{$allGuildEventStats}} --}}
           <br><br>
          
          
            <div class="mb-3">
                <table class='table'>
                    <tr>
                        <th>Event</th>
                        <th>Member Name</th>
                        <th>Guild Pts</th>
                        <th>Solo Pts</th>
                        <th>League</th>
                        <th>Solo Rank</th>
                        <th>Global Rank</th>
                    </tr>

            @foreach($allGuildEventStats as $stats)
                    <tr>
                        <td>{{$stats->event->name}}</td>    {{-- Event Name --}}
                        <td>{{$stats->member->name}}</td>     {{-- Guild Pts --}}
                        <td>{{$stats->guild_pts}}</td>     {{-- Guild Pts --}}
                        <td>{{$stats->solo_pts}}</td>     {{-- Solo Pts --}}
                        <td>{{$stats->league->name}}</td>     {{-- League --}}
                        <td>{{$stats->solo_rank}}</td>     {{-- Solo Rank --}}    
                        <td>{{$stats->global_rank}}</td>     {{-- Global Rank --}}
                    </tr>
            @endforeach
                </table> 
            </div>

            <br><br>

           {{$member->guild}}
            <br>
            {{ "Is there anything here - " }} {{ isset($member[0]) ? $member[0] : "Not valid" }}
            <br>
            <br>
            <br>

            <h1>{{$member->name}}</h1>
    <br>
            {{$member->guild}}
    <br>
            {{$member->id}}
    <br>
    <br>
            <h3>testing output</h3>
    <br>
            {{$member->event_stats}}
    <br>
            {{$member->id}}
    <br>
         
            {{-- {{ $member->get('name') }} --}}

            {{-- {{ $member }} --}}
            {{-- {{ $guild }} --}}
            {{-- {{ $member->get('guild') }}       --}}

            {{ "Is there anything here - " }} {{ isset($member) ? $member : "Not valid" }}
            <br>
            {{ "Is there anything here - " }} {{ isset($pastEvents1) ? $pastEvents1 : "Not valid" }}
            <br>
            {{ "Is there anything here - " }} {{ isset($pastEvents2) ? $pastEvents2 : "Not valid" }}
            <br>
            <br>

            {{-- This works for $pastEvents1 --}}
            {{-- Testing for $pastEvents2 --}}
            <div class="mb-3">
                <table class='table'>
                    <tr>
                        <th>Event</th>
                        <th>Guild Pts</th>
                        <th>Solo Pts</th>
                        <th>League</th>
                        <th>Solo Rank</th>
                        <th>Global Rank</th>
                    </tr>

            @foreach($pastEvents2 as $pastEvents)
                    <tr>
                        <td>{{$pastEvents->event_name}}</td>    {{-- Event Name --}}
                        <td>{{$pastEvents->guild_pts}}</td>     {{-- Guild Pts --}}
                        <td>{{$pastEvents->solo_pts}}</td>     {{-- Solo Pts --}}
                        <td>{{$pastEvents->league}}</td>     {{-- League --}}
                        <td>{{$pastEvents->solo_rank}}</td>     {{-- Solo Rank --}}    
                        <td>{{$pastEvents->global_rank}}</td>     {{-- Global Rank --}}
                    </tr>
            @endforeach
                </table> 
            </div>




            {{-- @foreach($pastEvents2 as $pastEvents) --}}
                {{-- <div class="mb-3">
                    <h5>{{$pastEvents->event_id}}</h5>
                    <span>Guild Points: {{$pastEvents->guild_pts}}</span><br/>
                    <span>Solo Points: {{$pastEvents->solo_pts}}</span><br/>
                    <span>Solo Rank: {{$pastEvents->solo_rank}}</span><br/>
                    <span>Global Rank: {{$pastEvents->global_rank}}</span><br/>
                    <span>League: {{$pastEvents->league}}</span><br/> --}}
                    {{-- <span>{{$pastEvents->leagues->league_name}}</span><br/> --}}
                    {{-- <span>Current League: {{$member->league}}</span><br/> --}}
                {{-- </div> --}}
            {{-- @endforeach --}}


            <br>


            <ul>
                
                <li><h3>What should be on this page:</h3></li>
                <li>title with name of member</li>
                <li>list events participated</li>
                <li>last event participated?</li>
                <li>Personal Best:</li>
                <li>- League and rank</li>
                <li>- Solo Pts</li>
                <li>- Guild Pts</li>
                <li>- Global Rank</li>
                <li>Pie Chart for Leagues Participated</li>
                <li>For individual event stat page - show promoted or relegated league</li>
            </ul>

            <ul>
                <li><h3>List past events in a table:</h3></li>
                <li><h3>Two separate tables: Raid & Crusade</h3></li>
                <li>Show events - recent first</li>
                <li>Title rows</li>
                <li>Name of event</li>
                <li>Event date</li>
                <li>Guild Pts</li>
                <li>Solo Pts</li>
                <li>League</li>
                <li>Guild Rank</li>
                <li>Solo Rank</li>
                <li>Global Rank</li>
                <li>Add pagination to the bottom of the table</li>
                <li>Show last 5 events</li>
                <li>Order by column???</li>
            </ul>
     




        </div>     
@endsection