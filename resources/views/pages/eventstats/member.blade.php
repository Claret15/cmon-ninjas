@extends('layouts.app')

@section('content')
    <section class="container">
        {{-- <h1 class="mt-3 text-center">{{ $member->guild->name }}</h1> --}}
        <h1 class="mt-3 text-center heading">{{ $eventInfo->name }}</h1>
        <h3 class="text-center mb-3">{{ $eventInfo->eventType->name }}</h3>
        <h2 class="text-center"><a href="/members/{{$member->id}}">{{$member->name}}</a></h2>
        <a href="/guild/{{$member->guild_id}}/event/{{ $eventInfo->id}}" class="btn btn-danger btn-sm mb-2"><i class="fas fa-caret-left"></i> <i class="fas fa-list-ol fa-lg"></i></a>
        <article id="guild">
            <div class="table-responsive event-stat-member">
                <table class="table table-stats">
                    <thead class="thead-dark">
                        {{-- <tr> --}}
                            {{-- <th>Member</th> --}}
                        {{-- </tr> --}}
                    </thead>
                    <tbody>
                        @foreach($memberStat as $stats)
                        <tr>
                            <th>Pos.</th>
                            <td>{{$stats->position}}</td>
                        </tr>
                        <tr>
                            <th>Guild Pts</th>
                            <td>{{ number_format($stats->guild_pts) }}</td>     {{-- Guild Pts --}}
                        </tr>
                        <tr>
                            <th>Solo Pts</th>
                            <td>{{ number_format($stats->solo_pts) }}</td>      {{-- Solo Pts --}}
                        </tr>
                        <tr>
                            <th>G/S</th>
                            <td>{{ round(($stats->solo_pts/$stats->guild_pts), 2) }}</td>  {{-- g/s --}}
                        </tr>
                        <tr>
                            <th>League</th>
                            <td>{{ $stats->league->name }}</td>     {{-- League --}}
                        </tr>
                        <tr>
                            <th>Solo Rank</th>
                            <td>{{ number_format($stats->solo_rank) }}</td>     {{-- Solo Rank --}}
                        </tr>
                        <tr>
                            <th>Global Rank</th>
                            <td>{{ number_format($stats->global_rank) }}</td>   {{-- Global Rank --}}
                        </tr>
                        <tr>
                            <th>Perf.</th>
                            <td>{{ round(($stats->guild_pts/$guildPtsTotal)*100, 2) .'%' }}</td>   {{-- Performance --}}
                        </tr>
            @endforeach
                    </tbody>
                </table>
            </div>
        </article>

        <article>
            <div class="member-chart-container mx-auto mt-5">
                <canvas id="myChart"></canvas>
                <p class="text-center">Click on the legend above to hide bars</p>
            </div>

            <script>
                var solo = "{{$memberStat[0]->solo_pts}}" ;
                var guild = "{{$memberStat[0]->guild_pts}}";
                var average = "{{$guildPtsTotal/$participants}}";

                if(solo == guild){
                    var chartData = {
                        datasets: [
                            {
                                label: 'Average',
                                data: [average],
                                backgroundColor: [
                                    'rgba(255, 179, 25, 0.5)',
                                ],
                                borderColor: [
                                    'rgba(255, 179, 25, 1)',
                                ],
                                borderWidth: 1
                            },
                            {
                                label: 'Guild/Solo',
                                data: [ guild],
                                backgroundColor: [
                                    'rgba(255, 0, 0, 0.5)'
                                ],
                                borderColor: [
                                    'rgba(255, 0, 0, 1)'
                                ],
                                borderWidth: 1
                        }]
                    };
                } else{
                    var chartData = {
                        datasets: [
                            {
                                label: 'Average',
                                data: [average],
                                backgroundColor: [
                                    'rgba(255, 179, 25, 0.5)',
                                ],
                                borderColor: [
                                    'rgba(255, 179, 25, 1)',
                                ],
                                borderWidth: 1
                            },{
                                label: 'Solo',
                                data: [solo],
                                backgroundColor: [
                                    'rgba(0, 255, 255, 0.5)',
                                ],
                                borderColor: [
                                    'rgba(0, 255, 255, 1)',
                                ],
                                borderWidth: 1
                            },
                            {
                                label: 'Guild',
                                data: [ guild],
                                backgroundColor: [
                                    'rgba(255, 0, 0, 0.5)'
                                ],
                                borderColor: [
                                    'rgba(255, 0, 0, 1)'
                                ],
                                borderWidth: 1
                        }]
                    };
                }

                var ctx = document.getElementById("myChart").getContext("2d");
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: chartData,
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        legend: {
                            position: "bottom",
                        },
                        scales: {
                            yAxes: [{
                                scaleLabel: {
                                    display: true,
                                    labelString: "Points (bil)",
                                },
                                ticks: {
                                    callback:function(value,index, values){
                                        return value/1000000000;
                                    },
                                    beginAtZero:true
                                },
                            }],
                            xAxes: [{
                                scaleLabel: {
                                    display: true,
                                },
                            }]
                        }
                    }
                });
            </script>
        </article>
    </section>
@endsection