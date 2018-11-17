@extends('layouts.app')

@section('content')

    <main class="container">
        
        {{-- <p><a href="/members" class="btn btn-primary btn-sm"><< Back to members</a></p> --}}
        {{-- <br><br> --}}
        {{$guildPtsTotal}}
        <h1 class="mt-3 text-center">{{ $guild->name }}</h1>
        <h1 class="mt-3 text-center">{{ $eventInfo->name }}</h1>
        <h2 class="text-center">{{ $eventInfo->event_date->format("d M 'y") }}</h2>
        <h3 class="text-center">{{ $eventInfo->eventType->name }}</h3>
<br><br>  
        <div class="mb-3" id="guild">
            <div class="table-responsive">            
            <table class='table '>
                <thead class="thead-dark">
                    <tr>
                        {{-- <th>Event</th> --}}
                        <th>Position</th>
                        <th>Member</th>
                        <th>Guild Pts</th>
                        <th>Solo Pts</th>
                        <th>League</th>
                        <th>Solo Rank</th>
                        <th>Global Rank</th>
                    </tr>
                </thead>
                <tbody>

        @foreach($allGuildEventStats as $stats)
                    <tr>
                        <td>{{$stats->position}}</td> {{-- position--}}
                        <td><a href="/member/{{$stats->member->id}}/event/{{$stats->event_id}}">{{$stats->member->name}}</a></td>     {{-- Guild Pts --}}
                        <td>{{ $stats->guild_pts }}</td>     {{-- guild_pts --}}
                        <td>{{ $stats->solo_pts }}</td>      {{-- solo_pts --}}
                        <td>{{$stats->league->name}}</td>     {{-- league --}}
                        <td>{{ $stats->solo_rank }}</td>     {{-- solo_rank --}}  
                        <td>{{ $stats->global_rank }}</td>   {{-- global_rank --}}
                    </tr>
        @endforeach
                </tbody>
            </table> 
            </div>
        </div>

    </main>     
@endsection