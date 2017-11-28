@extends('layouts.app')


@section('sidenav')
<div class="btn-group-vertical">
    <a href="{{ route('services.index') }}" class="btn btn-sm btn-default">
        Back to Services
    </a>
    <a href="{{ route('events.create', $service->id) }}" class="btn btn-sm btn-default">
        <i class="fa fa-plus"></i> Add Event
    </a>
</div>
@endsection

@section('content')
@component('components.card')
    @slot('title')
        Service #{{ $service->id }} - {{ $service->name }}
    @endslot
    <h4>Events</h4>
    <div class="list-group">
        @foreach($service->events as $event)
        <a href="{{ route('events.show', [$service->id, $event->id]) }}" class="list-group-item">
            #{{ $event->id }} - {{ $event->name }}
        </a>
        @endforeach
    </div>

@endcomponent
@endsection