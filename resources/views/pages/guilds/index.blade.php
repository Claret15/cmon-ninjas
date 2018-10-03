@extends('layouts.app')

@section('content')
        <div class="container">
            <div class="jumbotron">
                <h1>Guild Tests</h1>
                <p>Testing queries to ensure that all works as intended</p>
            </div>
        </div>     

        <div class="container">
            
                <h1>Guild Members</h1>
                
               

                {{-- {{$members}};
                <br />
                <br />
                <br /> --}}
                
            <!--
                <pre>
                    <?php
                        // print_r($members);
                            // echo "<br>";
                            // echo "<br>";
                    ?>
                </pre>
            -->

            {{-- {{$members->guild_id}} --}}
            {{$members}}

<h1>USING $members</h1>
        @foreach($members as $member)
            <div class="mb-3">
                <h5><a href="/members/{{$member->id}}">{{$member->name}}</a></h5>
                <span>Guild: {{$member->guild->name}}</span><br/>
                <span>Current League: {{$member->eventstats}}</span><br/>
            </div>
        @endforeach

        <h1>USING $members</h1>
        @foreach($members as $member)
            <div class="mb-3">
                <h5><a href="/members/{{$member->id}}">{{$member->name}}</a></h5>
                {{-- <span>Guild: {{$member->guild}}</span><br/> --}}
                {{-- <span>Current League: {{$member->league}}</span><br/> --}}
            </div>
        @endforeach
                
                
        </div>     
@endsection