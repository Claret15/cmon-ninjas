@extends('layouts.app')

@section('content')

    <section class="container mt-3">
        
        <h1 class="text-center"><i class="fas fa-torii-gate fa-2x"></i></h1>
        
        <h1 class="text-center">{{ $guild->name }}</h1>
        <h3 class="text-center">Guild Members</h3>
        
        <section class="members-grid">
        @foreach($members as $member)       {{-- 15rem looks good --}}
        <div class="card text-center m-1 " >  
            <a href="/members/{{$member->id}}">
            <div class="card-body">
                {{$member->name}}
            </div>
            </a>
        </div>
        @endforeach
        </div>
            
            
    </section>

@endsection