@extends('layouts.app')

@section('content')
<div class="container">
    <div class="">
        <h1>Tests - File upload</h1>
                

            {!! Form::open(['action' => 'ImportController@importEventStatsCrusade', 'files' => true]) !!}
            {{Form::file('csv')}}
            {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
            {!! Form::close() !!}
<br><br><br>
{{print_r($data)}}
<br><br>
{{-- 
        @foreach($data as $data)
        
            <h5><a href="">{{$data->member_id}}</a></h5>
            <p>Current League: {{$data->league_id}}</p>
        
        @endforeach --}}


<br><br>


{{$members}}

<br><br>
        @foreach($members as $member)
        
            <h5><a href="">{{$member->name}}</a></h5>
            <p>Current League: {{$member->league_id}}</p>
        
        @endforeach
        
        
        
    </div>
</div>     
@endsection