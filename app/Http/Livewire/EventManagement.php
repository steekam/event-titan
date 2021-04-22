<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;
use Livewire\Redirector;

class EventManagement extends Component
{
    public Event $event;

    protected $rules = [
        'event.title' => ['required'],
        'event.description' => ['required'],
        'event.start_datetime' => ['required', 'date', 'after_or_equal:today'],
        'event.end_datetime' => ['required', 'date', 'after:event.start_datetime'],
    ];

    public function mount(): void
    {
        $this->event = new Event();
    }

    public function create_event()
    {
        $this->validate();

        $this->event->owner()
            ->associate(auth()->user())
            ->save();

        $this->event = new Event();

        session()->flash("success", "Event successfully created.");

        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.event-management');
    }
}
