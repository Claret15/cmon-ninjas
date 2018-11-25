@extends('layouts.app')

@section('content')
    <section class="container">
        <h1>MEMBER INDEX</h1>
        @foreach($members as $member)
        <div class="mb-3">
            <h5><a href="/players/{{$member->id}}">{{$member->name}}</a></h5>
        </div>
        @endforeach
    </section>
@endsection