@extends('layouts.app')

@section('content')
  <div class="container ">

    <h1 class="text-center">Add New Event</h1>
    
    <div class="add-event">
      {!! Form::open(['action' => 'EventController@store', 'method' => 'POST']) !!}
      <div class="form-group ">
        {{Form::label('event_name', 'Event Name', ['class' => ''])}}
        {{Form::text('event_name', '', ['class' => 'form-control', 'placeholder' => 'Event']) }}
      </div>
      <div class="form-row">
        <div class="form-group col-md-6"">
          {{Form::label('event_date', 'Event Date', ['class' => ''] )}}
          <div>
            {{Form::date('event_date', \Carbon\Carbon::now(), ['class' => 'form-control']) }}
          </div>
        </div>
        <div class="form-group col-md-6"">
          {{Form::label('event_type', 'Event Type', ['class' => ''])}}
          <div>
          {{Form::select('event_type', ['1' => 'Raid', '2' => 'Crusade', '3' => 'Arena'], 1, ['class' => 'form-control'])}}
          </div>
        </div>
      </div>
      {{Form::submit('Add Event',['class' => 'btn btn-primary btn-block'])}}
      {!! Form::close() !!}
    </div>

  </div>


@endsection