@extends('layouts.app')

@section('content')
    <section class="container">
        <h1>Add New Event Type</h1>
        {!! Form::open(['action' => 'EventTypeController@store', 'method' => 'POST']) !!}
        <div class="form-group ">
            {{Form::label('name', 'Event Type', ['class' => ''])}}
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Event Type']) }}
        </div>
        {{Form::submit('Add Event Type',['class' => 'btn btn-success btn-block'])}}
        {!! Form::close() !!}
    </section>
@endsection