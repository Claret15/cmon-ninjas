@extends('layouts.app')

@section('content')

    <main class="container">

        {{-- <h1 class="mt-3 text-center">{{ $member->guild->name }}</h1> --}}
        <h1 class="mt-3 text-center heading">{{ $eventInfo->name }}</h1>
        <h3 class="text-center mb-3">{{ $eventInfo->eventType->name }}</h3>

        <a href="/guild/{{$member->guild_id}}/event/{{ $eventInfo->id}}" class="btn btn-danger btn-sm mb-2"><i class="fas fa-caret-left"></i> <i class="fas fa-list-ol fa-lg"></i></a>
        <div id="guild">
            <div class="table-responsive">
            <table class="table table-stats">
                <thead class="thead-dark">
                    <tr>
                        <th>Pos.</th>
                        <th>Member</th>
                        <th>Guild Pts</th>
                        <th>Solo Pts</th>
                        <th>League</th>
                        <th>Solo Rank</th>
                        <th>Global Rank</th>
                        <th>Perf.</th>
                    </tr>
                </thead>
                <tbody>

        @foreach($memberStat as $stats)
                    <tr>
                        <td>{{$stats->position}}</td>
                        <td><a href="/members/{{$stats->member->id}}">{{$stats->member->name}}</a></td>     {{-- Guild Pts --}}
                        <td>{{ number_format($stats->guild_pts) }}</td>     {{-- Guild Pts --}}
                        <td>{{ number_format($stats->solo_pts) }}</td>      {{-- Solo Pts --}}
                        <td>{{ $stats->league->name }}</td>     {{-- League --}}
                        <td>{{ number_format($stats->solo_rank) }}</td>     {{-- Solo Rank --}}
                        <td>{{ number_format($stats->global_rank) }}</td>   {{-- Global Rank --}}
                        <td>{{ round(($stats->guild_pts/$guildPtsTotal)*100, 2) .'%' }}</td>   {{-- Performance --}}
                    </tr>
        @endforeach
                </tbody>
            </table>
            </div>
        </div>

    </main>
@endsection