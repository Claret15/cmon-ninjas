@extends('layouts.app')

@section('content')
    <section class="container">
        <article>
            <h1 class="text-center"><i class="fas fa-user-ninja fa-2x mb-2"></i></h1>
            <h2 class="text-center heading mb-3">{{$member->name}}</h2>
            {{-- <h3 class="text-center">{{$member->guild->name}}</h3> --}}
        </article>
    </section>
{{-- Back Button --}}
    <div class="container mt-2">
        <a href="/guild/{{$member->guild_id}}" class="btn btn-danger btn-sm p-2"><i class="fas fa-caret-left"></i>&nbsp;&nbsp;<i class="fas fa-torii-gate fa-lg"></i></a>
    </div>
{{-- Event Listing --}}
    <section class="container mt-2">
        <div class="card member-card">
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
                    <div class="table-responsive">
                        <table class='table  table-hover'>
                            <thead class="thead-dark">
                                <tr>
                                    <th>Event</th>
                                    <th>Pos.</th>
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
                                    <td><a href="/guild/{{$member->guild_id}}/event/{{$stats->event_id}}/">{{$stats->event->name}}</a></td>
                                    <td>{{ number_format($stats->position) }}</td>
                                    <td>{{ number_format($stats->guild_pts) }}</td>
                                    <td>{{ number_format($stats->solo_pts) }}</td>
                                    <td>{{ $stats->league->name }}</td>
                                    <td>{{ number_format($stats->solo_rank) }}</td>
                                    <td>{{ number_format($stats->global_rank) }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
    {{-- Tab Content - Raid Events --}}
                <div class="tab-pane fade" id="raid" role="tabpanel" aria-labelledby="raid-tab">
                    <div class="table-responsive">
                        <table class='table'>
                            <thead class="thead-dark">
                                <tr>
                                    <th>Event</th>
                                    <th>Pos.</th>
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
                                    <td><a href="/guild/{{$member->guild_id}}/event/{{$stats->event_id}}/">{{$stats->event->name}}</a></td>
                                    <td>{{ number_format($stats->position) }}</td>
                                    <td>{{ number_format($stats->guild_pts) }}</td>
                                    <td>{{ number_format($stats->solo_pts) }}</td>
                                    <td>{{$stats->league->name }}</td>
                                    <td>{{ number_format($stats->solo_rank) }}</td>
                                    <td>{{ number_format($stats->global_rank) }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
    {{-- Tab Content - Crusade Events --}}
                <div class="tab-pane fade" id="crusade" role="tabpanel" aria-labelledby="crusade-tab">
                    <div class="table-responsive">
                        <table class='table'>
                            <thead class="thead-dark">
                                <tr>
                                    <th>Event</th>
                                    <th>Pos.</th>
                                    <th>Guild Pts</th>
                                    <th>League</th>
                                    <th>Solo Rank</th>
                                    <th>Global Rank</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($memberStatsCrusade as $stats)
                                <tr>
                                    <td><a href="/guild/{{$member->guild_id}}/event/{{$stats->event_id}}/">{{$stats->event->name}}</a></td>
                                    <td>{{ number_format($stats->position) }}</td>
                                    <td>{{ number_format($stats->guild_pts) }}</td>
                                    <td>{{ $stats->league->name }}</td>
                                    <td>{{ number_format($stats->solo_rank) }}</td>
                                    <td>{{ number_format($stats->global_rank) }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
    {{-- Tab Content - Crusade Events --}}
                <div class="tab-pane fade" id="arena" role="tabpanel" aria-labelledby="arena-tab">
                    <div class="table-responsive">
                        <table class='table'>
                            <thead class="thead-dark">
                                <tr>
                                    <th>Event</th>
                                    <th>Pos.</th>
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
                                    <td><a href="/guild/{{$member->guild_id}}/event/{{$stats->event_id}}/">{{$stats->event->name}}</a></td>
                                    <td>{{ number_format($stats->position) }}</td>
                                    <td>{{ number_format($stats->guild_pts) }}</td>
                                    <td>{{ number_format($stats->solo_pts) }}</td>
                                    <td>{{ $stats->league->name }}</td>
                                    <td>{{ number_format($stats->solo_rank) }}</td>
                                    <td>{{ number_format($stats->global_rank) }}</td>
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