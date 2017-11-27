@extends('layouts.app')

@section('sidenav')
<a href="{{ route('services.index') }}" class="btn btn-sm btn-default">
    Back to Service 
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
<form action="{{ route('events.store', $service->id) }}" method="POST">
@component('components.card', ['title' => 'Create a new Event'])
    {{ csrf_field() }}
    <div class="alert alert-info">
        <strong>For Service #{{ $service->id }} - {{ $service->name }}</strong>
    </div>
    <div class="form-group">
        <label for="name" class="control-label">Event Name</label>
        <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="form-group">
        <label for="description" class="control-label">Description</label>
        <textarea class="form-control" id="description" name="description"></textarea>
    </div>

    @slot('footer')
        <button type="submit" class="btn btn-primary">Create Event!</button>
    @endslot
@endcomponent
</form> 

@endsection