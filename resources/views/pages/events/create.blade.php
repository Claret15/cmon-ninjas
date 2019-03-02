@extends('layouts.app') 
@section('content')
<section class="container ">
    <h1 class="text-center">Add New Event</h1>
    <article class="add-event">
        {!! Form::open(['action' => 'EventController@store', 'method' => 'POST']) !!}
        <div class="form-group ">
            {{Form::label('name', 'Event Name', ['class' => ''])}} {{Form::text('name', '', ['class' => 'form-control', 'placeholder'
            => 'Event']) }}
        </div>
        <div class="form-row">
            <div class="form-group col-md-6" ">
                {{Form::label('event_date', 'Event Date', ['class' => ''] )}}
                <div>
                    {{Form::date('event_date', \Carbon\Carbon::now(), ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="form-group col-md-6 "">
                {{Form::label('event_type_id', 'Event Type', ['class' => ''])}}
                <div>
                    {{Form::select('event_type_id', ['1' => 'Raid', '2' => 'Crusade', '3' => 'Arena'], 1, ['class' => 'form-control'])}}
                </div>
            </div>
        </div>
        {{Form::submit('Add Event',['class' => 'btn btn-primary btn-block'])}} {!! Form::close() !!}
    </article>
</section>
@endsection