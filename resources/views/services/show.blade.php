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

    @if($service->description)
    <p>{{ $service->description }}</p>
    <hr>
    @endif

    <h4>Events</h4>
    <div class="list-group">
        @forelse($service->events as $event)
        <a href="{{ route('events.show', [$service->id, $event->id]) }}" class="list-group-item">
            #{{ $event->id }} - {{ $event->name }} 
            <i class="pull-right fa fa-{{ $event->enabled ? 'check text-success' : 'close text-danger' }}"></i>
        </a>
        @empty
        <div class="list-group-item">No Events Found</div>
        @endforelse
    </div>

@endcomponent
@endsection