@extends('layouts.app')

@section('test-heading')
        <div class="container">
            <div class="jumbotron">
                <h1>Guild Tests</h1>
                <p>Testing queries to ensure that all works as intended</p>
            </div>
        </div>     
@endsection

@section('tests')
        <div class="container">
            
                <h1>Guild Members</h1>
                
                {{$players}};
                <br />
                <br />
                <br />
                
            <!--
                <pre>
                    <?php
                        // print_r($players);
                            // echo "<br>";
                            // echo "<br>";
                    ?>
                </pre>
            -->


                @foreach($players as $player)
                    <div class="mb-3">
                        <h5><a href="">{{$player->name}}</a></h5>
                        <span>Guild: {{$player->guild}}</span><br/>
                        <span>Current League: {{$player->league}}</span><br/>
                    </div>
                @endforeach
                
                
        </div>     
@endsection