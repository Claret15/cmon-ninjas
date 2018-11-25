@extends('layouts.app')

@section('content')
    <section class="container ">
        <h1>Update Leagues</h1>
        {!! Form::open(['action' => ['LeagueController@update', $league->id], 'method' => 'POST']) !!}
        <div class="form-group ">
            {{Form::label('name', 'Event Name', ['class' => ''])}}
            {{Form::text('name', $league->name, ['class' => 'form-control']) }}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Update',['class' => 'btn btn-primary btn-block'])}}
        {!! Form::close() !!}
    </section>
@endsection