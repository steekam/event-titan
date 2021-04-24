<?php

namespace App\Http\Controllers;

use App\Models\Event;

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

}
