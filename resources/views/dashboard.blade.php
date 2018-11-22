@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="/events" class="btn btn-primary">Add Event</a>
                    <a href="/members/create" class="btn btn-primary">Add Member</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
