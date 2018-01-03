@extends('layouts.app')

@section('content')


@component('components.card', ['title' => "To Do's"])

<ul>
    <li><s>Find a way to store event requests so they can be passed to listeners async</s></li>
    <li>Add request validation</li>
    <li>Add data transformation</li>
    <li>Add logging of all actions</li>
    <li>Add a way for events to be manually re-triggered and listeners to be manually re-notified (helpful when max retries has been exhausted)</li>
    <li>Limit Services creation by admins (this will keep things clean)</li>
    <li>Verify the system can recover from a complete restart</li>
    <li>Verify queue job exceptions will not be an issue</li>
    <li>Error notifications via email</li>
    <li>Redis would be awesome, but we could probably use AWS SQS for free (10M+100GB = 11.15/month, First 1M = Free)</li>
    <li>Might want to add a Failed Listener to all Events so the system that triggered the event can get notifications of failures</li>
    <li>Change delays to minutes instead of seconds</li>
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
    <li><s>Add field to force events settings to override listener settings, otherwise listener settings will override event's</s></li>
    <li>Rate Limiting</li>
    <li><s>Add log of actions (like Stripe.com)</s> <- this will be Triggers</li>
    <li><s>Add event to the Event.php class that creates a confirmation code when an Event is created</s></li>
</ul>

<h3>Listeners</h3>
<ul>
    <li>Editing</li>
    <li>Add requires confirmation boolean</li>
    <li>Add field to determine max number of tries before a successful delivery</li>
    <li>Add field to set the delay between retries in seconds</li>
    <li><s>Add webhook url for event data to be POSTed</s></li>
    <li>Add a field for max consecutive fails before disabled</li>
    <li><s>Add log of actions (like Stripe.com)</s> <- this will be Dispatches</li>
</ul>


<h3>[Event] Triggers</h3>
<p>These are HTTP endpoints where 3rd party Services POST data to "trigger events"</p>
<ul>
    <li>Should store the entire request (headers, body, status code, ...)</li>
    <li>Should contain a field or fields to know when the trigger has been delivered or failed</li>
    <li>Belongs to an Event</li>
    <li>Has many Dispatches</li>
</ul>

<h3>[Listener] Dispatches</h3>
<p>A Dispatch occurs when an Event notifies its Listeners.</p>
<ul>
    <li>A single dispatch should be a queueable job</li>
    <li>Should pass along the body from the Trigger</li>
    <li>Belongs to a Listener</li>
    <li>Belongs to a Trigger</li>
</ul>
@endcomponent

@endsection