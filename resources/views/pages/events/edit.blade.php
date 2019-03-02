@extends('layouts.app') 
@section('content')
<section class="container ">
    <h1>Update Event</h1>
    <article>
        {!! Form::open(['action' => ['EventController@update', $event->id], 'method' => 'POST']) !!}
        <div class="form-group ">
            {{Form::label('name', 'Event Name', ['class' => ''])}} {{Form::text('name', $event->name, ['class' => 'form-control']) }}
        </div>
        <div class="form-row">
            <div class="form-group col-md-6" ">
                {{Form::label('event_date', 'Event Date', ['class' => ''] )}}
                <div>
                    {{Form::date('event_date', $event->event_date, ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="form-group col-md-6 "">
                {{Form::label('event_type_id', 'Event Type', ['class' => ''])}}
                <div>
                    {{Form::select('event_type_id', ['0' => 'Select...', '1' => 'Raid', '2' => 'Crusade', '3' => 'Arena'], $event->event_type_id,
                    ['class' => 'form-control'])}}
                </div>
            </div>
        </div>
        {{Form::hidden('_method', 'PUT')}} {{Form::submit('Update Event',['class' => 'btn btn-primary btn-block'])}} {!! Form::close()
        !!}
    </article>
</section>
@endsection