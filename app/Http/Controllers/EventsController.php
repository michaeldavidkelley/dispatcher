<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Event;
use Illuminate\Validation\Rule;

class EventsController extends Controller
{
    public function index(Service $service)
    {
        $events = $service->events;

        return view('events.index', compact('events'));
    }

    public function create(Service $service)
    {
        return view('events.create', compact('service'));
    }

    public function store(Request $request, Service $service)
    {
        $this->validate($request, [
            'name' => [
                'required',
                Rule::unique('events')->where(function ($query) use ($service) {
                    return $query->where('service_id', $service->id);
                }),
            ],
            'descipription' => '',
        ]);

        $event = $service->events()->create($request->only('name', 'description'));

        return redirect()->route('events.show', [$service->id, $event->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service, Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
