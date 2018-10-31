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
                    </div>
                </div>
            </article>
            @endforeach
        </section>


    </section>
@endsection