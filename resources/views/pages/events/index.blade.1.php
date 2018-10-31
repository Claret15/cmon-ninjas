@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">{{$guildName->name}}</h1>
    <h3 class="text-center">Guild Members</h3>
    <br><br>
    <h3 class="text-center">This should be a list of all participating guilds using the webiste for their statistics.</h3>
                
<br><br>
    {{-- <h1>USING $members</h1>
        @foreach($members as $member)
            <div class="mb-3">
                <h5><a href="/members/{{$member->id}}">{{$member->name}}</a></h5>
                <span>Guild: {{$member->guild->name}}</span><br/>
                <span>Current League: {{$member->eventstats}}</span><br/>
            </div>
        @endforeach --}}


    {{-- @foreach($guilds as $guild)
        <div class="mb-3">
            <h5><a href="/guild/{{$guild->id}}">{{$guild->name}}</a></h5>
        </div>
    @endforeach --}}
        
    {{-- <div class="container"> --}}
    <div class="d-inline-flex flex-wrap ">
        {{-- <div class="mx-auto"> --}}
            @foreach($guilds as $guild)
            <div class="card text-center m-2 mr-auto " style="width: 18rem;">
                <a href="/members/{{$guild->id}}">
                <div class="card-body">
                    {{$guild->name}}
                </div>
                </a>
            </div>
            @endforeach
        {{-- </div> --}}
    </div>
{{-- </div> --}}
                
</div>     
@endsection