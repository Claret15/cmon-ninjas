@extends('layouts.app')

@section('content')
    <section class="container">
        <h1>Update Guild</h1>
        {!! Form::open(['action' => ['GuildController@update', $guild->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('name', 'Guild', ['class' => ''])}}
            {{Form::text('name', $guild->name, ['class' => 'form-control']) }}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Update Guild',['class' => 'btn btn-primary btn-block'])}}
        {!! Form::close() !!}
    </section>
@endsection