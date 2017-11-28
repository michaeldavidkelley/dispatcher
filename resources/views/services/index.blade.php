@extends('layouts.app')

@section('sidenav')
<a href="{{ route('services.create') }}" class="btn btn-sm btn-default">
    <i class="fa fa-plus"></i> Add Service
</a>
@endsection

@section('content')

@component('components.card', ['title' => 'Services'])
    <div class="list-group">
        @foreach($services as $service)
        <a href="{{ route('services.show', $service->id) }}" class="list-group-item">
            #{{$service->id}} {{ $service->name }}
        </a>
        @endforeach
    </div>
@endcomponent

@endsection
