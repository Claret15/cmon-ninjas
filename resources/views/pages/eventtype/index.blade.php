@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Event Types</h1>
    <br><br>
     
    <table class='table table-sm  mx-auto' style="min-width:350px;max-width: 600px;">
        <thead class="thead-dark">
            <tr>
                <th>Event Type</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>

    @foreach($eventTypes as $type)
            <tr>
                <td>{{ $type->name}}</td>    
                <td> <a href="/event_type/{{$type->id}}/edit" class="btn btn-warning btn-sm">Edit</a></td>
                <td> 
                    {!!Form::open(['action' => ['EventTypeController@destroy', $type->id], 'method' => 'POST'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete',['class' => 'btn btn-sm btn-danger'])}}
                    {!!Form::close() !!}
                </td>
            </tr>
    @endforeach
            <tr>
                <td colspan="3"><a class="nav-link btn btn-success btn-sm" id="new-event-type" href="/event_type/create">Add Event Type</a></td>
            </tr>
        </tbody>
    </table> 
                       
</div>     
@endsection