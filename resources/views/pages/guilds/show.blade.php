@extends('layouts.app')

@section('content')
    <section class="container">

        {{-- <div class="text-center">
            <a href="/guild/1/events/" class="btn btn-danger btn-lg mt-3 mb-5"><i class="fas fa-calendar-alt fa-lg"></i>&nbsp; Events</a>
        </div> --}}
        <h1 class="text-center"><i class="fas fa-torii-gate fa-2x"></i></h1>
        {{-- <h1 class="text-center">{{ $guild->name }}</h1> --}}
        <h1 class="text-center heading">Guild Members</h1>
    @auth
        <p class="text-center"><a href="/members/create" class="btn btn-success btn-lg mx-auto">Add member</a></p>
    @endauth
        <section class="members-grid mt-3">
        @foreach($members as $member)
            @if ($member->is_active === true)
            <article class="card text-center m-1 " >
                <a href="/members/{{$member->id}}">
                <div class="card-body">
                    {{$member->name}}
                @auth
                    <div class="mt-2">
                        <div class="d-inline-block mr-2">
                            <a href="/members/{{$member->id}}/edit" class="btn btn-warning btn-sm ">Edit</a>
                        </div>
                        <div class="d-inline-block">
                            {!!Form::open(['action' => ['MemberController@destroy', $member->id], 'method' => 'POST'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete',['class' => 'btn btn-sm btn-danger'])}}
                            {!!Form::close() !!}
                        </div>
                    </div>
                @endauth
                </div>
                </a>
            </article>
            @endif
        @endforeach
        </section>
    @auth
        <h1 class="text-center heading mt-5">Past Members</h1>
        <section class="members-grid mt-3">
        @foreach($members as $member)
            @if ($member->is_active === false)
            <article class="card text-center m-1 " >
                <a href="/members/{{$member->id}}">
                <div class="card-body member">
                    {{$member->name}}
                @auth
                    <div class="mt-2">
                        <div class="d-inline-block mr-2">
                            <a href="/members/{{$member->id}}/edit" class="btn btn-warning btn-sm ">Edit</a>
                        </div>
                        <div class="d-inline-block">
                            {!!Form::open(['action' => ['MemberController@destroy', $member->id], 'method' => 'POST'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete',['class' => 'btn btn-sm btn-danger'])}}
                            {!!Form::close() !!}
                        </div>
                    </div>
                @endauth
                </div>
                </a>
            </article>
            @endif
        @endforeach
        </section>
    @endauth
    </section>
@endsection