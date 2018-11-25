@extends('layouts.app')

@section('content')
    <section class="container">
        <h1>Add Guild</h1>
        {!! Form::open(['action' => 'GuildController@store', 'method' => 'POST']) !!}
        <div class="form-group ">
            {{Form::label('name', 'Guild', ['class' => ''])}}
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Guild Name']) }}
        </div>
        {{Form::submit('Add Guild',['class' => 'btn btn-success btn-block'])}}
        {!! Form::close() !!}
    </section>
@endsection