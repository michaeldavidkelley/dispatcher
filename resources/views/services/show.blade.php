@extends('layouts.app')


@section('sidenav')
<a href="{{ route('services.index') }}" class="btn btn-sm btn-default">
    Back to Services
</a>
@endsection

@section('content')
@component('components.card')
    @slot('title')
        Service #{{ $service->id }} - {{ $service->name }}
    @endslot

    @slot('footer')
    <a href="{{ route('events.create', $service->id) }}" class="btn btn-sm btn-default">
        <i class="fa fa-plus"></i> Add Event
    </a>
    @endslot
    <div class="list-group">
        @foreach($service->events as $event)
        <a href="{{ route('events.show', [$service->id, $event->id]) }}" class="list-group-item">
            #{{ $event->id }} - {{ $event->name }}
        </a>
        @endforeach
    </div>

@endcomponent
@endsection