@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Leagues</h1>
    <br><br>
     
    <table class='table table-sm  mx-auto' style="min-width:350px;max-width: 600px;">
        <thead class="thead-dark">
            <tr>
                <th>League</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>

    @foreach($leagues as $type)
            <tr>
                <td>{{ $type->name}}</td>    
                <td> <a href="/leagues/{{$type->id}}/edit" class="btn btn-warning btn-sm">Edit</a></td>
                <td> 
                    {!!Form::open(['action' => ['LeagueController@destroy', $type->id], 'method' => 'POST'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete',['class' => 'btn btn-sm btn-danger'])}}
                    {!!Form::close() !!}
                </td>
            </tr>
    @endforeach
            <tr>
                <td colspan="3"><a class="nav-link btn btn-success btn-sm" id="new-league" href="/leagues/create">Add League</a></td>
            </tr>
        </tbody>
    </table> 
                       
</div>     
@endsection