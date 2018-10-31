@extends('layouts.app')

@section('content')

{{-- Back Button --}}
        <div class="container mb-3">
            <a href="/members" class="btn btn-primary btn-sm"><< Back to members</a>
        </div>
{{-- Title --}}
        <section class="container">
            <article>
                <h1 class="text-center">{{$member->name}}</h1>
                <h3 class="text-center">{{$member->guild->name}}</h3>
            </article>
        </section>
{{-- Event Listing --}}
        <section class="container mt-5">
            <div class="card member-events">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" id="eventsContent" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all" role="tab" aria-controls="All" aria-selected="true">All</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="raid-tab" data-toggle="tab" href="#raid" role="tab" aria-controls="Raid" aria-selected="false">Raid</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="crusade-tab" data-toggle="tab" href="#crusade" role="tab" aria-controls="Crusade" aria-selected="false">Crusade</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="arena-tab" data-toggle="tab" href="#arena" role="tab" aria-controls="Arena" aria-selected="false">Arena</a>
                    </li>
                    </ul>
                </div>
            {{-- Tab Content - All Events --}}
                <div class="tab-content card-body" id="eventsContent">
                    <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                        {{-- <div class="mb-3"> --}}
                            <table class='table'>
                                <thead>
                                    <tr>
                                        <th>Event</th>
                                        <th>Guild Pts</th>
                                        <th>Solo Pts</th>
                                        <th>League</th>
                                        <th>Solo Rank</th>
                                        <th>Global Rank</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($MemberStatsAll as $stats)
                                    <tr>
                                        <td>{{$stats->event->name}}</td>    {{-- Event Name --}}
                                        <td>{{$stats->guild_pts}}</td>     {{-- Guild Pts --}}
                                        <td>{{$stats->solo_pts}}</td>     {{-- Solo Pts --}}
                                        <td>{{$stats->league->name}}</td>     {{-- League --}}
                                        <td>{{$stats->solo_rank}}</td>     {{-- Solo Rank --}}    
                                        <td>{{$stats->global_rank}}</td>     {{-- Global Rank --}}
                                    </tr>
                                @endforeach
                                </tbody>
                            </table> 
                        {{-- </div> --}}
                    </div>
            {{-- Tab Content - Raid Events --}}
                    <div class="tab-pane fade" id="raid" role="tabpanel" aria-labelledby="raid-tab">
                        <div class="mb-3">
                            <table class='table'>
                                <thead>
                                    <tr>
                                        <th>Event</th>
                                        <th>Guild Pts</th>
                                        <th>Solo Pts</th>
                                        <th>League</th>
                                        <th>Solo Rank</th>
                                        <th>Global Rank</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($MemberStatsRaid as $stats)
                                    <tr>
                                        <td>{{$stats->event->name}}</td>    {{-- Event Name --}}
                                        <td>{{$stats->guild_pts}}</td>     {{-- Guild Pts --}}
                                        <td>{{$stats->solo_pts}}</td>     {{-- Solo Pts --}}
                                        <td>{{$stats->league->name}}</td>     {{-- League --}}
                                        <td>{{$stats->solo_rank}}</td>     {{-- Solo Rank --}}    
                                        <td>{{$stats->global_rank}}</td>     {{-- Global Rank --}}
                                    </tr>
                                @endforeach
                                </tbody>
                            </table> 
                        </div>
                    </div>
            {{-- Tab Content - Crusade Events --}}
                    <div class="tab-pane fade" id="crusade" role="tabpanel" aria-labelledby="crusade-tab">
                        <div class="mb-3">
                            <table class='table'>
                                <thead>
                                    <tr>
                                        <th>Event</th>
                                        <th>Guild Pts</th>
                                        <th>League</th>
                                        <th>Solo Rank</th>
                                        <th>Global Rank</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($MemberStatsCrusade as $stats)
                                    <tr>
                                        <td>{{$stats->event->name}}</td>    {{-- Event Name --}}
                                        <td>{{$stats->guild_pts}}</td>     {{-- Guild Pts --}}
                                        <td>{{$stats->league->name}}</td>     {{-- League --}}
                                        <td>{{$stats->solo_rank}}</td>     {{-- Solo Rank --}}    
                                        <td>{{$stats->global_rank}}</td>     {{-- Global Rank --}}
                                    </tr>
                                @endforeach
                                </tbody>
                            </table> 
                        </div>
                    </div>
            {{-- Tab Content - Crusade Events --}}
                    <div class="tab-pane fade" id="arena" role="tabpanel" aria-labelledby="arena-tab">
                        <div class="mb-3">
                            <table class='table'>
                                <thead>
                                    <tr>
                                        <th>Event</th>
                                        <th>Guild Pts</th>
                                        <th>Solo Pts</th>
                                        <th>League</th>
                                        <th>Solo Rank</th>
                                        <th>Global Rank</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($MemberStatsArena as $stats)
                                    <tr>
                                        <td>{{$stats->event->name}}</td>    {{-- Event Name --}}
                                        <td>{{$stats->guild_pts}}</td>     {{-- Guild Pts --}}
                                        <td>{{$stats->solo_pts}}</td>     {{-- Solo Pts --}}
                                        <td>{{$stats->league->name}}</td>     {{-- League --}}
                                        <td>{{$stats->solo_rank}}</td>     {{-- Solo Rank --}}    
                                        <td>{{$stats->global_rank}}</td>     {{-- Global Rank --}}
                                    </tr>
                                @endforeach
                                </tbody>
                            </table> 
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="container">
{{-- 
            
           {{$member}}
<br><br>
           {{$member->guild->name}}
<br><br>
           {{$member->eventStats}}

           <br><br> --}}

{{-- 
        <h5>$memberGuild:</h5>
           {{$memberGuild}}
           <br>
           {{$memberGuild->name}}
           <br><br>
        <h5>$testOutput:</h5>
           {{$testOutput}}
           <br><br> --}}


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




            {{-- {{ "Is there anything here - " }} {{ isset($member) ? $member : "Not valid" }}
            <br> --}}
            {{-- {{ "Is there anything here - " }} {{ isset($pastEvents1) ? $pastEvents1 : "Not valid" }}
            <br> --}}
            {{-- {{ "Is there anything here - " }} {{ isset($pastEvents2) ? $pastEvents2 : "Not valid" }}
            <br>
            <br> --}}

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
     




        </section>     
@endsection