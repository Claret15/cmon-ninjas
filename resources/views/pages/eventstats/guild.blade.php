@extends('layouts.app')

@section('content')

    <section class="container">
        {{-- <h1 class="mt-3 text-center">{{ $guild->name }}</h1> --}}
        <h1 class="mt-3 text-center heading">{{ $event->name }}</h1>
        <h3 class="text-center mb-3">{{ $event->eventType->name }}</h3>

@auth
{{-- Button trigger Modal Create --}}
        <ul class="nav mt-5 mb-1">
            <li><h3>Guild points check - {{ number_format($guildPtsTotal)}}</h3></li>
            <li class="ml-auto">
                <button type="button" class="btn btn-success ml-auto" data-toggle="modal" data-target="#createModal">
                Add Event Stat
                </button>
            </li>
        </ul>
@endauth

        <a href="/guilds/{{$guild->id}}/events" class="btn btn-danger btn-sm p-2"><i class="fas fa-caret-left"></i>&nbsp;&nbsp;<i class="fas fa-calendar-alt fa-lg"></i></a>
        <section class="mt-2" id="guild">
            <article class="table-responsive">
                <table class="table table-stats">
                    <thead class="thead-dark">
                        <tr>
                            <th>Pos.</th>
                            <th>Member</th>
                            <th>Guild Pts</th>
                            <th>Solo Pts</th>
                            <th>G/S</th>
                            <th>League</th>
                            <th>Solo Rank</th>
                            <th>Global Rank</th>
                            <th>Perf.</th>
                        </tr>
                    </thead>
                    <tbody>

            @foreach($allGuildEventStats as $stats)
                        <tr>
                            <td>
                                {{ $stats->position }}
                            @auth
                                <br>
                                <button
                                    class="btn btn-danger btn-sm mt-2"
                                    data-toggle="modal"
                                    data-target="#deleteModal"
                                    data-stat="{{ $stats->id }}"
                                >
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            @endauth
                            </td> {{-- position--}}
                            <td>
                                <a href="/member/{{ $stats->member_id }}/event/{{ $stats->event_id }}">{{ $stats->member->name }}</a>
                            @auth
                                <br>
                                <button
                                    class="btn btn-success btn-sm mt-2"
                                    data-toggle="modal"
                                    data-target="#editModal"
                                    data-stat="{{ $stats->id }}"
                                    data-event="{{ $stats->event_id }}"
                                    data-member="{{ $stats->member_id }}"
                                    data-position="{{ $stats->position }}"
                                    data-league="{{ $stats->league_id }}"
                                    data-guild_pts="{{ $stats->guild_pts }}"
                                    data-solo_pts="{{ $stats->solo_pts }}"
                                    data-solo_rank="{{ $stats->solo_rank }}"
                                    data-global_rank="{{ $stats->global_rank }}"
                                >
                                    <i class="fas fa-edit"></i>
                                </button>
                            @endauth
                            </td>     {{-- member --}}
                            <td>{{ number_format($stats->guild_pts) }}</td>
                            <td>{{ number_format($stats->solo_pts) }}</td>
                        @if($stats->guild_pts < 1 || $stats->solo_pts < 1)
                            <td>N/A</td>                   {{-- g/s --}}
                        @else
                            <td>{{ round(($stats->solo_pts/$stats->guild_pts), 2) }}</td>
                        @endif
                            <td>{{ $stats->league->name }}</td>
                            <td>{{ number_format($stats->solo_rank) }}</td>
                            <td>{{ number_format($stats->global_rank) }}</td>
                        @if($stats->guild_pts <1)
                            <td>0%</td>
                        @else
                            <td>{{ round(($stats->guild_pts/$guildPtsTotal)*100, 2) .'%' }}</td>
                        @endIf
                        </tr>
            @endforeach
                    </tbody>
                </table>
            </article>
        </section>

{{-- Modal - Create Stat --}}
        <article class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createModalLabel">Add Event Stat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
        {{-- Modal Body --}}
                    <div class="modal-body">
                        <div class="add-event">
                            {!! Form::open(['action' => ['EventStatController@store', $guild->id, $event->id], 'method' => 'POST']) !!}
                            {{-- {{Form::hidden('guild_id', $guild->id)}} --}}
                            {{Form::hidden('event_id', $event->id)}}
                            <div class="form-group">
                                {{Form::label('member_id', 'Member Name', ['class' => ''])}}
                                {{Form::select('member_id', $members, null, ['class' => 'form-control'])}}
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    {{Form::label('guild_pts', 'Guild Points', ['class' => ''])}}
                                    {{Form::number('guild_pts', '', ['class' => 'form-control', 'placeholder' => 'Add Guild points', 'step' => '0'])}}
                                </div>
                                <div class="form-group col-md-6">
                                    {{Form::label('position', 'Guild Position', ['class' => ''])}}
                                    {{Form::number('position', '', ['class' => 'form-control', 'min' => '1', 'max' => '30', 'placeholder' => 'Guild Position'])}}
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    {{Form::label('solo_pts', 'Solo Points', ['class' => ''])}}
                                    <div>
                                        {{Form::number('solo_pts', '', ['class' => 'form-control', 'placeholder' => 'Add Solo points'])}}
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    {{Form::label('league_id', 'League', ['class' => ''])}}
                                    <div>
                                        {{Form::select('league_id', $leagues, null, ['class' => 'form-control'])}}
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    {{Form::label('solo_rank', 'Solo Rank', ['class' => ''])}}
                                    <div>
                                        {{Form::number('solo_rank', '', ['class' => 'form-control', 'placeholder' => 'Solo rank'])}}
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    {{Form::label('global', 'Global Rank', ['class' => ''])}}
                                    <div>
                                        {{Form::number('global_rank', '', ['class' => 'form-control', 'placeholder' => 'Global rank'])}}
                                    </div>
                                </div>
                            </div>
                            {{Form::submit('Add Event Stat', ['class' => 'btn btn-primary btn-block'])}}
                            {!! Form::close() !!}
                        </div>
                    </div>
        {{-- Modal Body - End --}}
                </div>
            </div>
        </article>

{{-- Modal - Edit Stat --}}
        <article class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Update Event Stat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
        {{-- Modal Body --}}
                    <div class="modal-body">
                        <div class="add-event">
                            {!! Form::open(['action' => ['EventStatController@update', $guild->id, $event->id], 'method' => 'POST']) !!}
                            {{Form::hidden('_method', 'Put')}}
                            {{Form::hidden('id', '')}}
                            {{Form::hidden('event_id', $event->id)}}
                            <div class="form-group">
                                {{Form::label('member_id', 'Member Name', ['class' => ''])}}
                                {{Form::select('member_id', $members, null, ['class' => 'form-control'])}}
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    {{Form::label('guild_pts', 'Guild Points', ['class' => ''])}}
                                    {{Form::number('guild_pts', '', ['class' => 'form-control'])}}
                                </div>
                                <div class="form-group col-md-6">
                                    {{Form::label('position', 'Guild Position', ['class' => ''])}}
                                    {{Form::number('position', '', ['class' => 'form-control'])}}
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    {{Form::label('solo_pts', 'Solo Points', ['class' => ''])}}
                                    <div>
                                        {{Form::number('solo_pts', '', ['class' => 'form-control'])}}
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    {{Form::label('league_id', 'League', ['class' => ''])}}
                                    <div>
                                        {{Form::select('league_id', $leagues, null, ['class' => 'form-control'])}}
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    {{Form::label('solo_rank', 'Solo Rank', ['class' => ''])}}
                                    <div>
                                        {{Form::number('solo_rank', '', ['class' => 'form-control'])}}
                                    </div>
                                </div>
                                <div class="form-group col-md-6"">
                                    {{Form::label('global', 'Global Rank', ['class' => ''])}}
                                    <div>
                                        {{Form::number('global_rank', '', ['class' => 'form-control'])}}
                                    </div>
                                </div>
                            </div>
                            {{Form::submit('Update Event Stat', ['class' => 'btn btn-primary btn-block'])}}
                            {!! Form::close() !!}
                        </div>
                    </div>
        {{-- Modal Body - End --}}
                </div>
            </div>
        </article>

{{-- Modal - Delete Stat --}}
        <article class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Confirm Delete...</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
        {{-- Modal Body --}}
                    <div class="modal-body">
                        <div class="delete-stat">
                            <h5>Are you sure?</h5>
                            {!!Form::open(['action' => ['EventStatController@destroy', $guild->id, $event->id], 'method' => 'POST'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::hidden('eventStat', '')}}
                            {{Form::submit('Delete',['class' => 'btn btn-sm btn-danger'])}}
                            {!!Form::close() !!}

                        </div>
                    </div>
        {{-- Modal Body - End --}}
                </div>
            </div>
        </article>

    </section>
@endsection

@section('scripts')
<script defer>

$(document).ready(function() {

    $('#editModal').on('show.bs.modal', function (event) {
        var eventStat = $(event.relatedTarget);
        var stat = eventStat.data('stat');
        var event = eventStat.data('event');
        var member = eventStat.data('member');
        var position = eventStat.data('position');
        var league = eventStat.data('league');
        var guild_pts = eventStat.data('guild_pts');
        var solo_pts = eventStat.data('solo_pts');
        var solo_rank = eventStat.data('solo_rank');
        var global_rank= eventStat.data('global_rank');
        var modal = $(this);
        modal.find('.modal-body input[name="id"]').val(stat);
        modal.find('.modal-body input[name="event_id"]').val(event);
        modal.find('.modal-body select[name="member_id"]').val(member);
        modal.find('.modal-body select[name="league_id"]').val(league);
        modal.find('.modal-body input[name="position"]').val(position);
        modal.find('.modal-body input[name="guild_pts"]').val(guild_pts);
        modal.find('.modal-body input[name="solo_pts"]').val(solo_pts);
        modal.find('.modal-body input[name="solo_rank"]').val(solo_rank);
        modal.find('.modal-body input[name="global_rank"]').val(global_rank);

    })

    $('#deleteModal').on('show.bs.modal', function (event) {
        var eventStat = $(event.relatedTarget);
        var stat = eventStat.data('stat');
        var modal = $(this);

        modal.find('.modal-body input[name="eventStat"]').val(stat);
    })

})

</script>

@endsection