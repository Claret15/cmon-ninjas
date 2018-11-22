@extends('layouts.app')

@section('content')

    <section class="container mt-3">

        <h1 class="text-center"><i class="fas fa-torii-gate fa-2x"></i></h1>
        {{-- <h1 class="text-center">{{ $guild->name }}</h1> --}}
        <h1 class="text-center">Guild Members</h1>

        <section class="members-grid mt-3">
        @foreach($members as $member)
        <div class="card text-center m-1 " >
            <a href="/members/{{$member->id}}">
            <div class="card-body">
                {{$member->name}}
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
            </div>

            </a>
        </div>
        @endforeach
        </div>


    </section>

@endsection