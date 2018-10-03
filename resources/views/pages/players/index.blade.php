@extends('layouts.app')

@section('content')
        <div class="container">
            <div class="jumbotron">
                <h1>PLAYER INDEX</h1>
                <p>Testing queries to SHOW ALL PLAYER STATS that all works as intended</p>
            </div>
        </div>     

        <div class="container">
            
                <h1>PLAYER INDEX</h1>
                


                @foreach($players as $player)
                <div class="mb-3">
                    <h5><a href="/players/{{$player->id}}">{{$player->name}}</a></h5>
                    {{-- <span>Guild: {{$player->guild}}</span><br/> --}}
                    {{-- <span>Current League: {{$player->league}}</span><br/> --}}
                </div>
            @endforeach



                
                
        </div>     
@endsection