<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventBooking;

class EventController extends Controller
{
    public function show(Event $event)
    {
        return view('show-event', ['event' => $event->load('owner')]);
    }

    public function create()
    {
        return view('create-event');
    }

    public function edit(Event $event)
    {
        return view('edit-event', ['event' => $event]);
    }

    public function bookTicket(Event $event)
    {
        $this->authorize('bookTicket', $event);

        EventBooking::create([
            'user_id' => auth()->id(),
            'event_id' => $event->id,
        ]);

        session()->flash('flash.banner', "Booked ticket for '{$event->title}' event.");
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('dashboard');
    }

}
