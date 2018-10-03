@extends('layouts.app')

@section('content')
        <div class="container">
            <div class="jumbotron">
                <h1>MEMBER INDEX</h1>
                <p>Testing queries to SHOW ALL MEMBER STATS that all works as intended</p>
            </div>
        </div>     

        <div class="container">
            
                <h1>MEMBER INDEX</h1>
                


                @foreach($memberS as $member)
                <div class="mb-3">
                    <h5><a href="/players/{{$member->id}}">{{$member->name}}</a></h5>
                    {{-- <span>Guild: {{$member->guild}}</span><br/> --}}
                    {{-- <span>Current League: {{$member->league}}</span><br/> --}}
                </div>
            @endforeach



                
                
        </div>     
@endsection