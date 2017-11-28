@extends('layouts.app')

@section('sidenav')
<a href="{{ route('events.show', [$service->id, $event->id]) }}" class="btn btn-sm btn-default">
    Back to Event 
</a>
@endsection

@section('content')
@if(count($errors))
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('listeners.store', [$service->id, $event->id]) }}" method="POST">
@component('components.card', ['title' => 'Create new Listener'])
    {{ csrf_field() }}
    <div class="alert alert-info">
        <strong>For Event #{{ $event->id }} - {{ $event->name }}</strong>
    </div>
    <div class="form-group">
        <label for="name" class="control-label">Listener Name</label>
        <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="form-group">
        <label for="description" class="control-label">Description</label>
        <textarea class="form-control" id="description" name="description"></textarea>
    </div>
    <div class="form-group">
        <label for="webhook" class="control-label">Webhook</label>
        <input type="text" class="form-control" id="webhook" name="webhook">
    </div>

    @slot('footer')
        <button type="submit" class="btn btn-primary">Create Listener!</button>
    @endslot
@endcomponent
</form> 

@endsection