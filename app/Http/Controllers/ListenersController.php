<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Event;
use Illuminate\Validation\Rule;
use App\Listener;

class ListenersController extends Controller
{
    public function create(Service $service, Event $event)
    {
        return view('listeners.create', compact('service', 'event'));
    }

    public function store(Request $request, Service $service, Event $event)
    {
        $this->validate($request, [
            'name' => [
                'required',
                Rule::unique('listeners')->where(function ($query) use ($event) {
                    return $query->where('event_id', $event->id);
                }),
            ],
            'descipription' => '',
        ]);

        $listener = $event->listeners()->create($request->only('name', 'description'));

        return redirect()->route('listeners.show', [$service->id, $event->id, $listener->id]);
    }

    public function show(Service $service, Event $event, Listener $listener)
    {
        return view('listeners.show', compact('service', 'event', 'listener'));
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
