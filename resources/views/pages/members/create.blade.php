@extends('layouts.app')

@section('content')
  <div class="container ">

    <h1 class="text-center">Add Member</h1>
    
    <div class="add-member">
      {!! Form::open(['action' => 'MemberController@store', 'method' => 'POST']) !!}
      <div class="form-group ">
        {{Form::label('name', 'Name', ['class' => ''])}}
        {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name']) }}
      </div>
      <div class="form-row">
        <div class="form-group col-md-6"">
          {{Form::label('guild', 'Guild', ['class' => ''] )}}
          <div>
            {{Form::text('guild', 'Ninjas Guild', ['class' => 'form-control', 'placeholder' => '']) }}
          </div>
        </div>
        <div class="form-group col-md-6"">
          {{Form::label('is_active', 'Active', ['class' => ''])}}
          <div>
          {{Form::select('is_active', ['0' => 'Not Active', '1' => 'Active'], 1, ['class' => 'form-control'])}}
          </div>
        </div>
      </div>
      {{Form::submit('Add Member',['class' => 'btn btn-primary btn-block'])}}
      {!! Form::close() !!}
    </div>

  </div>


@endsection