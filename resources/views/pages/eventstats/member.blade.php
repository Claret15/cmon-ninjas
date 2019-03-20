@extends('layouts.app')
@section('head')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
@endsection

@section('content')
<section class="container">
    {{-- <h1 class="mt-3 text-center">{{ $member->guild->name }}</h1> --}}
    <h1 class="mt-3 text-center heading">{{ $event->name }}</h1>
    <h3 class="text-center mb-3">{{ $event->eventType->name }}</h3>
    <h2 class="text-center"><a href="/members/{{$member->id}}">{{$member->name}}</a></h2>
    <a href="/guilds/{{$member->guild_id}}/event/{{ $event->id}}" class="btn btn-danger btn-sm mb-2">
        <i class="fas fa-caret-left"></i>
        <i class="fas fa-list-ol fa-lg"></i>
    </a>
    <article id="guild">
        <div class="table-responsive event-stat-member">
            <table class="table">
                <tbody>
                    @foreach($memberStat as $stats)
                    <tr>
                        <th>Pos.</th>
                        <td>{{$stats->position}}</td>
                    </tr>
                    <tr>
                        <th>Guild Pts</th>
                        <td>{{ number_format($stats->guild_pts) }}</td>
                    </tr>
                    <tr>
                        <th>Solo Pts</th>
                        <td>{{ number_format($stats->solo_pts) }}</td>
                    </tr>
                    <tr>
                        <th>G/S</th>
                        <td>{{ round(($stats->solo_pts/$stats->guild_pts), 2) }}</td>
                    </tr>
                    <tr>
                        <th>League</th>
                        <td>{{ $stats->league->name }}</td>
                    </tr>
                    <tr>
                        <th>Solo Rank</th>
                        <td>{{ number_format($stats->solo_rank) }}</td>
                    </tr>
                    <tr>
                        <th>Global Rank</th>
                        <td>{{ number_format($stats->global_rank) }}</td>
                    </tr>
                    <tr>
                        <th>Perf.</th>
                        <td>{{ round(($stats->guild_pts/$guildPtsTotal)*100, 2) .'%' }}</td>
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
                var average = "{{round($guildPtsTotal/$participants)}}";

                if(solo == guild){
                    var chartData = {
                        datasets: [
                            {
                                label: 'Guild Average',
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
                        },                            {
                                label: 'Guild Average',
                                data: [average],
                                backgroundColor: [
                                    'rgba(255, 179, 25, 0.5)',
                                ],
                                borderColor: [
                                    'rgba(255, 179, 25, 1)',
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
                        },
                        tooltips: {
                            callbacks: {
                                label:  function(tooltipItem, data){
                                    var label = data.datasets[tooltipItem.datasetIndex].label || '';
                                    var value = tooltipItem.yLabel.toString().split(/(?=(?:...)*$)/).join(',');
                                    return `${label} : ${value}`;
                                }
                            }
                        }
                    }
                });
        </script>
    </article>
</section>
@endsection