@extends('layouts.app')

@section('content')
    <section class="container ">
        <h1 class="text-center">Update Member</h1>
        <div class="add-member">
            {!! Form::open(['action' => ['MemberController@update', $member->id], 'method' => 'POST']) !!}
            <div class="form-group ">
                {{Form::label('name', 'Name', ['class' => ''])}}
                {{Form::text('name', $member->name, ['class' => 'form-control', 'placeholder' => 'Name']) }}
            </div>
            <div class="form-row">
                <div class="form-group col-md-6"">
                    {{Form::label('guild', 'Guild', ['class' => ''] )}}
                    <div>
                    {{Form::text('guild', $member->guild->name, ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="form-group col-md-6"">
                    {{Form::label('is_active', 'Active', ['class' => ''])}}
                    <div>
                    {{Form::select('is_active', ['0' => 'Not Active', '1' => 'Active'], $member->is_active, ['class' => 'form-control'])}}
                    </div>
                </div>
            </div>
            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit('Update Member',['class' => 'btn btn-primary btn-block'])}}
            {!! Form::close() !!}
        </div>
    </section>
@endsection