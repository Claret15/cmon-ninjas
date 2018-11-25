@extends('layouts.app')

@section('content')
    <section class="container">
        <h1>Add League</h1>
        {!! Form::open(['action' => 'LeagueController@store', 'method' => 'POST']) !!}
        <div class="form-group ">
            {{Form::label('name', 'League', ['class' => ''])}}
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'League']) }}
        </div>
        {{Form::submit('Add League',['class' => 'btn btn-primary btn-block'])}}
        {!! Form::close() !!}
    </section>
@endsection