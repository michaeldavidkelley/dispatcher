@extends('layouts.app')

@section('sidenav')
<div class="btn-group-vertical">
<a href="{{ route('services.show', $service->id) }}" class="btn btn-sm btn-default">
    Back to Service
</a>
<a href="{{ route('listeners.create', [$service->id, $event->id]) }}" class="btn btn-sm btn-default">
    <i class="fa fa-plus"></i> Add Listener
</a>
</div>
@endsection

@section('content')
<div class="alert alert-info">For Service #{{ $service->id }} - {{ $service->name }}</div>
@component('components.card')
    @slot('title')
        Event #{{ $event->id }} - {{ $event->name }}
    @endslot

    @slot('footer')
        <p>Listener Defaults:</p>
        <ul>
            <li>First Delay: {{ $event->listeners_first_delay }}</li>
            <li>Max Retries: {{ $event->listeners_max_retries }}</li>
            <li>Retry Delay: {{ $event->listeners_retry_delay }}</li>
            <li>Can Override: {{ $event->listeners_can_override ? 'Yes' : 'No' }}</li>
            <li>Require Confirm: {{ $event->listeners_require_confirmation ? 'Yes' : 'No' }}</li>
        </ul>
    @endslot

    @if($event->description)
    <p>{{ $event->description }}</p>
    <hr>
    @endif

    <h4>Listeners</h4>
    <div class="list-group">
        @forelse($event->listeners as $listener)
        <a href="{{ route('listeners.show', [$service->id, $event->id, $listener->id]) }}" class="list-group-item">
            Listener #{{ $listener->id }} - {{ $listener->name }}
        </a>
        @empty
        <div class="list-group-item">No Listeners Found</div>
        @endforelse
    </div>

    <hr>

    <h4>Webhook</h4>
    <div><code>{{ route('events.trigger', $event->id) }}</code></div>
@endcomponent

@endsection
