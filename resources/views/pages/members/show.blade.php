@extends('layouts.app')

@section('content')

{{-- Back Button --}}
        <div class="container my-3">
            <a href="/guild/{{$member->guild_id}}" class="btn btn-primary btn-sm p-2"><i class="fas fa-caret-left"></i>&nbsp;&nbsp;<i class="fas fa-torii-gate fa-lg"></i></a>
        </div>
{{-- Title --}}
        <section class="container">
            <article>
                <h1 class="text-center"><i class="fas fa-user-ninja fa-2x"></i></h1>
                <h1 class="text-center">{{$member->name}}</h1>
                {{-- <h3 class="text-center">{{$member->guild->name}}</h3> --}}
            </article>
        </section>
{{-- Event Listing --}}
        <section class="container my-5">
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
                                @foreach($memberStatsAll as $stats)
                                    <tr>
                                        <td><a href="/guild/{{$member->guild_id}}/event/{{$stats->event_id}}/">{{$stats->event->name}}</a></td>    {{-- Event Name --}}
                                        <td>{{ number_format($stats->guild_pts) }}</td>     {{-- Guild Pts --}}
                                        <td>{{ number_format($stats->solo_pts) }}</td>     {{-- Solo Pts --}}
                                        <td>{{ $stats->league->name }}</td>     {{-- League --}}
                                        <td>{{ number_format($stats->solo_rank) }}</td>     {{-- Solo Rank --}}
                                        <td>{{ number_format($stats->global_rank) }}</td>     {{-- Global Rank --}}
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
                                @foreach($memberStatsRaid as $stats)
                                    <tr>
                                        <td><a href="/guild/{{$member->guild_id}}/event/{{$stats->event_id}}/">{{$stats->event->name}}</a></td>    {{-- Event Name --}}
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
                                @foreach($memberStatsCrusade as $stats)
                                    <tr>
                                        <td><a href="/guild/{{$member->guild_id}}/event/{{$stats->event_id}}/">{{$stats->event->name}}</a></td>    {{-- Event Name --}}
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
                                @foreach($memberStatsArena as $stats)
                                    <tr>
                                        <td><a href="/guild/{{$member->guild_id}}/event/{{$stats->event_id}}/">{{$stats->event->name}}</a></td>    {{-- Event Name --}}
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

@endsection