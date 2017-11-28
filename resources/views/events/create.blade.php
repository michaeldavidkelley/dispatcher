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
    <h4>Listener Settings</h4>

    <div class="form-group">
        <div class="checkbox">
            <label>
                <input type="checkbox" value="1" name="listeners_can_override"> Listeners Can Override
            </label>
        </div>
        <p class="help-block">Allow each listener to override these settings?</p>
    </div>
    <div class="form-group">
        <div class="checkbox">
            <label>
                <input type="checkbox" value="1" checked name="listeners_require_confirmation"> Require Confirmation
            </label>
        </div>
        <p class="help-block">Require listeners to provide a confirmation code?</p>
    </div>
    <div class="form-group">
        <label for="listeners_first_delay" class="control-label">First Delay (seconds)</label>
        <input type="text" class="form-control" id="listeners_first_delay" name="listeners_first_delay" value="10">
        <p class="help-block">Number of seconds to delay before the listeners are notified the first time</p>
    </div>
    <div class="form-group">
        <label for="listeners_max_retries" class="control-label">Max Retries</label>
        <input type="text" class="form-control" id="listeners_max_retries" name="listeners_max_retries" value="10">
        <p class="help-block">Max times the listeners will be tried before stopping</p>
    </div>
    <div class="form-group">
        <label for="listeners_retry_delay" class="control-label">Retry Delay (seconds)</label>
        <input type="text" class="form-control" id="listeners_retry_delay" name="listeners_retry_delay" value="60">
        <p class="help-block">Number of seconds between retries</p>
    </div>

    @slot('footer')
        <button type="submit" class="btn btn-primary">Create Event!</button>
    @endslot
@endcomponent
</form> 

@endsection