@extends('layouts.app')

@section('head-meta')
<meta http-equiv="Content-Language" content="en">
<meta name="google" content="notranslate" />
@endsection

@section('content')
    <section class="container">
        {{-- <div class="text-center">
            <a href="/guilds/1" class="btn btn-danger btn-lg mb-4"><i class="fas fa-torii-gate"></i>&nbsp; Members</a>
        </div> --}}
        <h1 class="text-center heading">Events</h1>
        <section class="show-events mt-5">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true">All</a>
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
            </ul>
            <section class="tab-content" id="myTabContent">
                <article class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                    <div class="mb-3">
                        <table class='table table-sm events'>
                            <thead class="thead-dark">
                                <tr>
                                    <th>Event</th>
                                    <th>Type</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>

                            @foreach($events as $event)
                                <tr>
                                    <td><a href="/guilds/{{$guild->id}}/event/{{$event->id}}">{{ $event->name }}</a></td>
                                    <td>{{ $event->eventType->name }}</td>
                                    <td>{{ $event->event_date->format("d M 'y") }}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </article>
                <article class="tab-pane fade" id="raid" role="tabpanel" aria-labelledby="raid-tab">
                    <div class="mb-3">
                        <table class='table table-sm'>
                            <thead class="thead-dark">
                                <tr>
                                    <th>Event</th>
                                    <th>Type</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>

                            @foreach($raid as $event)
                                <tr>
                                    <td><a href="/guilds/{{$guild->id}}/event/{{$event->id}}">{{ $event->name }}</a></td>
                                    <td>{{ $event->eventType->name }}</td>
                                    <td>{{ $event->event_date->format("d M 'y") }}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </article>
                <article class="tab-pane fade" id="crusade" role="tabpanel" aria-labelledby="crusade-tab">
                    <div class="mb-3">
                        <table class='table table-sm'>
                            <thead class="thead-dark">
                                <tr>
                                    <th>Event</th>
                                    <th>Type</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>

                            @foreach($crusade as $event)
                                <tr>
                                    <td><a href="/guilds/{{$guild->id}}/event/{{$event->id}}">{{ $event->name }}</a></td>
                                    <td>{{ $event->eventType->name }}</td>
                                    <td>{{ $event->event_date->format("d M 'y") }}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </article>
                <article class="tab-pane fade" id="arena" role="tabpanel" aria-labelledby="arena-tab">
                    <div class="mb-3">
                        <table class='table table-sm'>
                            <thead class="thead-dark">
                                <tr>
                                    <th>Event</th>
                                    <th>Type</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>

                            @foreach($arena as $event)
                                <tr>
                                    <td><a href="/guilds/{{$guild->id}}/event/{{$event->id}}">{{ $event->name }}</a></td>
                                    <td>{{ $event->eventType->name }}</td>
                                    <td>{{ $event->event_date->format("d M 'y")  }}</td>
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