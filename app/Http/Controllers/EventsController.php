<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Event;
use Illuminate\Validation\Rule;

class EventsController extends Controller
{
    public function create(Service $service)
    {
        return view('events.create', compact('service'));
    }

    public function store(Request $request, Service $service)
    {
        $data = $this->validate($request, [
            'name' => [
                'required',
                Rule::unique('events')->where(function ($query) use ($service) {
                    return $query->where('service_id', $service->id);
                }),
            ],
            'descipription' => '',
            'listeners_can_override' => 'boolean',
            'listeners_require_confirmation' => 'boolean',
            'listeners_max_retries' => 'required|integer|min:0',
            'listeners_first_delay' => 'required|integer|min:0',
            'listeners_retry_delay' => 'required|integer|min:10',
        ]);

        $event = $service->events()->create($data);

        return redirect()->route('events.show', [$service->id, $event->id]);
    }

    public function show(Service $service, Event $event)
    {
        return view('events.show', compact('service', 'event'));
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
