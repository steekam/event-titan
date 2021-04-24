<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;

class EventLists extends Component
{
    public function render()
    {
        return view('livewire.event-lists', [
            'events' => auth()->user()->events,
            'upcoming_events' => Event::upcoming()->where('user_id', '!=' ,auth()->id())->get()
        ]);
    }
}
