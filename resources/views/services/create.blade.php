@extends('layouts.app')

@section('sidenav')
<a href="{{ route('services.index') }}" class="btn btn-sm btn-default">
    Back to Services
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
<form action="{{ route('services.store') }}" method="POST">
@component('components.card', ['title' => 'Create a new Service'])
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name" class="control-label">Service Name</label>
        <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="form-group">
        <label for="description" class="control-label">Description</label>
        <textarea class="form-control" id="description" name="description"></textarea>
    </div>

    @slot('footer')
        <button type="submit" class="btn btn-primary">Create Service!</button>
    @endslot
@endcomponent
</form> 

@endsection