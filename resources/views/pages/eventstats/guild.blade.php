@extends('layouts.app')

@section('content')

    <main class="container">
        
        {{-- <p><a href="/members" class="btn btn-primary btn-sm"><< Back to members</a></p> --}}
        {{-- <br><br> --}}
        
        <h1 class="mt-3 text-center">{{ $guild->name }}</h1>
        <h1 class="mt-3 text-center">{{ $eventInfo->name }}</h1>
        <h2 class="text-center">{{ $eventInfo->event_date }}</h2>
        {{-- <h2 class="text-center">{{ $eventInfo->event_date->format("d M 'y") }}</h2> --}}
        <h3 class="text-center">{{ $eventInfo->eventType->name }}</h3>
<br><br>  
        <div class="mb-3" id="guild">
            <div class="table-responsive">            
            <table class='table '>
                <thead class="thead-dark">
                    <tr>
                        {{-- <th>Event</th> --}}
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
                        {{-- <td>{{$stats->event->name}}</td> --}}
                        <td><a href="/members/{{$stats->member->id}}">{{$stats->member->name}}</a></td>     {{-- Guild Pts --}}
                        <td>{{ number_format($stats->guild_pts) }}</td>     {{-- Guild Pts --}}
                        <td>{{ number_format($stats->solo_pts) }}</td>      {{-- Solo Pts --}}
                        <td>{{$stats->league->name}}</td>     {{-- League --}}
                        <td>{{ number_format($stats->solo_rank) }}</td>     {{-- Solo Rank --}}  
                        <td>{{ number_format($stats->global_rank) }}</td>   {{-- Global Rank --}}
                    </tr>
        @endforeach
                </tbody>
            </table> 
            </div>
        </div>

        {{-- {{$allGuildEventStatsPaginate->links()}} --}}
        
        <br><br>
     

        {{$allGuildEventStats}}
    </main>     
@endsection