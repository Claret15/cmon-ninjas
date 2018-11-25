@extends('layouts.app')

@section('content')
    <section class="container ">
        <h1>Update Event</h1>
        <article>
            {!! Form::open(['action' => ['EventController@update', $event->id], 'method' => 'POST']) !!}
            <div class="form-group ">
                {{Form::label('event_name', 'Event Name', ['class' => ''])}}
                {{Form::text('event_name', $event->name, ['class' => 'form-control']) }}
            </div>
            <div class="form-row">
                <div class="form-group col-md-6"">
                    {{Form::label('event_date', 'Event Date', ['class' => ''] )}}
                    <div>
                        {{Form::date('event_date', $event->event_date, ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="form-group col-md-6"">
                    {{Form::label('event_type', 'Event Type', ['class' => ''])}}
                    <div>
                        {{Form::select('event_type', ['0' => 'Select...', '1' => 'Raid', '2' => 'Crusade', '3' => 'Arena'], $eventType, ['class' => 'form-control'])}}
                    </div>
                </div>
            </div>
            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit('Update Event',['class' => 'btn btn-primary btn-block'])}}
            {!! Form::close() !!}
        </article>
    </section>


@endsection