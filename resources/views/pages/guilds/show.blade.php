@extends('layouts.app')

@section('content')

    <main class="container">

        <h1 class="text-center">{{ $guild->name }}</h1>
        <h3 class="text-center">Guild Members</h3>
        
        <br>

        <div class="d-inline-flex flex-wrap ">
        @foreach($members as $member)       {{-- 15rem looks good --}}
        <div class="card text-center m-1 " style="width: 15rem;">  
            <a href="/members/{{$member->id}}">
            <div class="card-body">
                {{$member->name}}
            </div>
            </a>
        </div>
        @endforeach
        </div>
            
            
    </main>

@endsection