@extends('layouts.app')

@section('content')
    <section class="container">
        <article class="row justify-content-center mb-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">Dashboard</div>
                    <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class="d-flex justify-content-around">
                            <a href="/events/create" class="btn btn-primary">Add Event</a>
                            <a href="/members/create" class="btn btn-primary">Add Member</a>
                        </div>
                    </div>
                </div>
            </div>
        </article>
        <section class="row justify-content-center">
            <article class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-header">Upload Crusade Stats</div>
                    <div class="card-body">
                        {!! Form::open(['action' => 'ImportController@importEventStatsCrusade', 'files' => true]) !!}
                        <div class="form-group">
                        {{Form::file('csv', ['class' => 'form-control-file'])}}
                        </div>
                        {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
                        {!! Form::close() !!}
                    </div>
                </div>
            </article>
            <article class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-header">Upload Raid Stats</div>
                    <div class="card-body">
                        {!! Form::open(['action' => 'ImportController@importEventStatsRaid', 'files' => true]) !!}
                        <div class="form-group">
                        {{Form::file('csv', ['class' => 'form-control-file'])}}
                        </div>
                        {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
                        {!! Form::close() !!}
                    </div>
                </div>
            </article>
            <article class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-header">Upload Arena Stats</div>
                    <div class="card-body">
                        {{-- {!! Form::open(['action' => 'ImportController@importEventStatsArena', 'files' => true]) !!} --}}
                        <div class="form-group">
                        {{Form::file('csv', ['class' => 'form-control-file'])}}
                        </div>
                        {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
                        {!! Form::close() !!}
                    </div>
                </div>
            </article>
        </section>
    </section>
@endsection
