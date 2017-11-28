@extends('layouts.app')

@section('sidenav')
<div class="btn-group-vertical">
<a href="{{ route('services.show', $service->id) }}" class="btn btn-sm btn-default">
    Back to Service
</a>
<a href="{{ route('events.show', [$service->id, $event->id]) }}" class="btn btn-sm btn-default">
    Back to Event
</a
</div>
@endsection

@section('content')
<div class="alert alert-info">
    Service #{{ $service->id }} - {{ $service->name }}
    <br>
    Event #{{ $event->id }} - {{ $event->name }}
</div>
@component('components.card')
    @slot('title')
        Listener #{{ $listener->id }} - {{ $listener->name }}
    @endslot
@endcomponent

@endsection
