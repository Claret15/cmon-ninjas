@extends('layouts.app')

@section('content')
  
  <div class="container">

    <h1>Add New Event Type</h1>
    
    {!! Form::open(['action' => 'EventTypeController@store', 'method' => 'POST']) !!}
    <div class="form-group ">
      {{Form::label('name', 'Event Type', ['class' => ''])}}
      {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Event Type']) }}
    </div>
    {{Form::submit('Submit',['class' => 'btn btn-primary btn-block'])}}
    {!! Form::close() !!}

  </div>

@endsection