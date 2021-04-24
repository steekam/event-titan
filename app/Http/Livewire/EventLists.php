<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EventLists extends Component
{
    public function render()
    {
        $events = auth()->user()->events;

        return view('livewire.event-lists', [
            'events' => $events
        ]);
    }
}
