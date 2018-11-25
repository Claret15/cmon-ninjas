@extends('layouts.welcome')

@section('content')
    <div class="ninja">
        <div class="intro d-inline-flex flex-column justify-content-end">
            <div class="mx-auto">
                <img src='ninja.png' alt="ninjas guild" class="img-ninja">
            </div>
            <div class="mx-auto p-4">
                <a href="/guild/1"><button class="enter-button">Enter</button></a>
            </div>
        </div>
    </div>
@endsection