@extends('layouts.app')

@section('content')


@component('components.card', ['title' => "To Do's"])

<ul>
    <li>Find a way to store event requests so they can be passed to listeners async</li>
    <li>Add request validation</li>
    <li>Add data transformation</li>
    <li>Add logging of all actions</li>
    <li>Add a way for events to be manually re-triggered and listeners to be manually re-notified (helpful when max retries has been exhausted)</li>
    <li>Limit Services creation by admins (this will keep things clean)</li>
</ul>

<h3>Services</h3>
<ul>
    <li>Editing</li>
</ul>

<h3>Events</h3>
<ul>
    <li>Editing</li>
    <li><s>Add field to set the initial delay before delivery</s></li>
    <li><s>Add field to set the max retries</s></li>
    <li><s>Add field to set the seconds between retries</s></li>
    <li>Add Scope (public, private, hidden)</li>
    <li>Create a auth code so the endpoint is not open to everyone for privately scoped events</li>
    <li><s>Requires confirmation</s></li> 
    <li>Add field to force events settings to override listener settings, otherwise listener settings will override event's</li>
    <li>Rate Limiting</li>
    <li>Add log of actions (like Stripe.com)</li>
    <li>Add event to the Event.php class that creates a confirmation code when an Event is created</li>
</ul>

<h3>Listeners</h3>
<ul>
    <li>Editing</li>
    <li>Add requires confirmation boolean</li>
    <li>Add field to determine max number of tries before a successful delivery</li>
    <li>Add field to set the delay between retries in seconds</li>
    <li><s>Add webhook url for event data to be POSTed</s></li>
    <li>Add a field for max consecutive fails before disabled</li>
    <li>Add log of actions (like Stripe.com)</li>
</ul>
@endcomponent

@endsection