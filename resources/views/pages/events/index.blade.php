@extends('layouts.app')

@section('content')
<section class="container">

    <h1 class="text-center">Events</h1>

    <section class="show-events mt-5">
        <ul class="nav nav-tabs" id="events" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="events-tab" data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true">All</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="raid-tab" data-toggle="tab" href="#raid" role="tab" aria-controls="raid" aria-selected="false">Raid</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="crusade-tab" data-toggle="tab" href="#crusade" role="tab" aria-controls="crusade" aria-selected="false">Crusade</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="arena-tab" data-toggle="tab" href="#arena" role="tab" aria-controls="arena" aria-selected="false">Arena</a>
        </li>
    @if(!Auth::guest())
        <li class="nav-item ml-auto">
            <a class="nav-link btn btn-success btn-sm" id="new-event" href="/events/create">Add event</a>
        </li>
    @endif
        </ul>
        <section class="tab-content" id="eventsContnet">
            <article class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="home-tab">
                <div class="mb-3">
                    <table class='table table-sm'>
                        <thead class="thead-dark">
                            <tr>
                                <th>Event</th>
                                <th>Type</th>
                                <th>Date</th>
                            @if(!Auth::guest())
                                <th></th>
                                <th></th>
                            @endif
                            </tr>
                        </thead>
                        <tbody>

                @foreach($events as $event)
                            <tr>
                                <td>{{ $event->name }}</td>
                                <td>{{ $event->eventType->name }}</td>
                                <td>{{ $event->event_date->format("d M 'y") }}</td>
                            @if(!Auth::guest())
                                <td> <a href="/events/{{$event->id}}/edit" class="btn btn-warning btn-sm">Edit</a></td>
                                <td>
                                    {!!Form::open(['action' => ['EventController@destroy', $event->id], 'method' => 'POST'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete',['class' => 'btn btn-sm btn-danger'])}}
                                    {!!Form::close() !!}
                                </td>
                            @endif
                            </tr>
                @endforeach
                        </tbody>
                    </table>
                </div>
            </article>
            <article class="tab-pane fade" id="raid" role="tabpanel" aria-labelledby="profile-tab">
                <div class="mb-3">
                    <table class='table table-sm'>
                        <thead class="thead-dark">
                            <tr>
                                <th>Event</th>
                                <th>Type</th>
                                <th>Date</th>
                            @if(!Auth::guest())
                                <th></th>
                                <th></th>
                            @endif
                            </tr>
                        </thead>
                        <tbody>

                @foreach($raid as $event)
                            <tr>
                                <td>{{ $event->name }}</td>
                                <td>{{ $event->eventType->name }}</td>
                                <td>{{ $event->event_date->format("d M 'y") }}</td>
                            @if(!Auth::guest())
                                <td> <a href="/events/{{$event->id}}/edit" class="btn btn-warning btn-sm">Edit</a></td>
                                <td>
                                    {!!Form::open(['action' => ['EventController@destroy', $event->id], 'method' => 'POST'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete',['class' => 'btn btn-sm btn-danger'])}}
                                    {!!Form::close() !!}
                                </td>
                            @endif
                            </tr>
                @endforeach
                        </tbody>
                    </table>
                </div>
            </article>
            <article class="tab-pane fade" id="crusade" role="tabpanel" aria-labelledby="contact-tab">
                <div class="mb-3">
                    <table class='table table-sm'>
                        <thead class="thead-dark">
                            <tr>
                                <th>Event</th>
                                <th>Type</th>
                                <th>Date</th>
                            @if(!Auth::guest())
                                <th></th>
                                <th></th>
                            @endif
                            </tr>
                        </thead>
                        <tbody>

                @foreach($crusade as $event)
                            <tr>
                                <td>{{ $event->name }}</td>
                                <td>{{ $event->eventType->name }}</td>
                                <td>{{ $event->event_date->format("d M 'y") }}</td>
                            @if(!Auth::guest())
                                <td> <a href="/events/{{$event->id}}/edit" class="btn btn-warning btn-sm">Edit</a></td>
                                <td>
                                    {!!Form::open(['action' => ['EventController@destroy', $event->id], 'method' => 'POST'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete',['class' => 'btn btn-sm btn-danger'])}}
                                    {!!Form::close() !!}
                                </td>
                            @endif
                            </tr>
                @endforeach
                        </tbody>
                    </table>
                </div>
            </article>
            <article class="tab-pane fade" id="arena" role="tabpanel" aria-labelledby="contact-tab">
                <div class="mb-3">
                    <table class='table table-sm'>
                        <thead class="thead-dark">
                            <tr>
                                <th>Event</th>
                                <th>Type</th>
                                <th>Date</th>
                            @if(!Auth::guest())
                                <th></th>
                                <th></th>
                            @endif
                            </tr>
                        </thead>
                        <tbody>

                @foreach($arena as $event)
                            <tr>
                                <td>{{ $event->name }}</td>
                                <td>{{ $event->eventType->name }}</td>
                                <td>{{ $event->event_date->format("d M 'y") }}</td>
                            @if(!Auth::guest())
                                <td> <a href="/events/{{$event->id}}/edit" class="btn btn-warning btn-sm">Edit</a></td>
                                <td>
                                    {!!Form::open(['action' => ['EventController@destroy', $event->id], 'method' => 'POST'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete',['class' => 'btn btn-sm btn-danger'])}}
                                    {!!Form::close() !!}
                                </td>
                            @endif
                            </tr>
                @endforeach
                        </tbody>
                    </table>
                </div>
            </article>
        </section>
    </section>
</section>
@endsection