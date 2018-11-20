@extends('layouts.app')
@section('content')
    <section>
        <h1 class="text-center mb-5">Guilds</h1>

        <section class="guild-grid">
            @foreach($guilds as $guild)
            <article>
                <div class="card guild-card">
                    <div class="card-body">
                        <h5><a href="/guild/{{$guild->id}}">{{$guild->name}}</a></h5>
                        <div class="mt-2">
                            <div class="d-inline-block mr-2">
                                <a href="/guild/{{$guild->id}}/edit" class="btn btn-warning btn-sm ">Edit</a>
                            </div>
                            <div class="d-inline-block">
                                {!!Form::open(['action' => ['GuildController@destroy', $guild->id], 'method' => 'POST'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete',['class' => 'btn btn-sm btn-danger'])}}
                                {!!Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </article>
            @endforeach
        </section>


    </section>
@endsection