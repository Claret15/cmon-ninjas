@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Events</h1>
    <br><br>

    <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="" data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true">All</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#raid" role="tab" aria-controls="raid" aria-selected="false">Raid</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#crusade" role="tab" aria-controls="crusade" aria-selected="false">Crusade</a>
    </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="home-tab">
            <div class="mb-3">         
                <table class='table table-sm'>
                    <thead class="thead-light">
                        <tr>
                            {{-- <th>Event</th> --}}
                            <th>Event</th>
                            <th>Type</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
        
            @foreach($events as $event)
                        <tr>
                            {{-- <td>{{$stats->event->name}}</td> --}}
                            <td>{{ $event->name }}</td>     {{-- Guild Pts --}}
                            <td>{{ $event->eventType->name }}</td>     {{-- Guild Pts --}}
                            <td>{{ $event->event_date }}</td>      {{-- Solo Pts --}}
                        </tr>
            @endforeach
                    </tbody>
                </table> 
            </div>
        </div>
        <div class="tab-pane fade" id="raid" role="tabpanel" aria-labelledby="profile-tab">
            <div class="mb-3">    
                <table class='table table-sm'>
                    <thead class="thead-light">
                        <tr>
                            {{-- <th>Event</th> --}}
                            <th>Event</th>
                            <th>Type</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
        
            @foreach($raid as $event)
                        <tr>
                            {{-- <td>{{$stats->event->name}}</td> --}}
                            <td>{{ $event->name }}</td>     {{-- Guild Pts --}}
                            <td>{{ $event->eventType->name }}</td>     {{-- Guild Pts --}}
                            <td>{{ $event->event_date }}</td>      {{-- Solo Pts --}}
                        </tr>
            @endforeach
                    </tbody>
                </table> 
            </div>
        </div>
        <div class="tab-pane fade" id="crusade" role="tabpanel" aria-labelledby="contact-tab">
            <div class="mb-3">         
                <table class='table table-sm'>
                    <thead class="thead-light">
                        <tr>
                            {{-- <th>Event</th> --}}
                            <th>Event</th>
                            <th>Type</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
        
            @foreach($crusade as $event)
                        <tr>
                            {{-- <td>{{$stats->event->name}}</td> --}}
                            <td>{{ $event->name }}</td>     {{-- Guild Pts --}}
                            <td>{{ $event->eventType->name }}</td>     {{-- Guild Pts --}}
                            <td>{{ $event->event_date }}</td>      {{-- Solo Pts --}}
                        </tr>
            @endforeach
                    </tbody>
                </table> 
            </div>
        </div>
    </div>                
</div>     
@endsection