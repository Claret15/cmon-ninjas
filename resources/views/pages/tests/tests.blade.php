@extends('layouts.app')

@section('test-heading')
        <div class="container">
            <div class="jumbotron">
                <h1>Tests</h1>
                <p>Testing queries to ensure that all works as intended</p>
            </div>
        </div>     
@endsection

@section('tests')
        <div class="container">
            <div class="">
                <h1>Tests!</h1>
                


                @foreach($members as $member)
                
                    <h5><a href="">{{$member->name}}</a></h5>
                    <p>Current League: {{$member->league_id}}</p>
                
                @endforeach
                
                
                
            </div>
        </div>     
@endsection