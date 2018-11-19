@extends('layouts.app')

@section('content')
  <div class="container ">

    <h1>Update Event Type</h1>
    
    {!! Form::open(['action' => ['EventTypeController@update', $eventType->id], 'method' => 'POST']) !!}
    <div class="form-group ">
      {{Form::label('name', 'Event Name', ['class' => ''])}}
      {{Form::text('name', $eventType->name, ['class' => 'form-control']) }}
    </div>
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Update',['class' => 'btn btn-primary btn-block'])}}
    {!! Form::close() !!}

  </div>

@endsection