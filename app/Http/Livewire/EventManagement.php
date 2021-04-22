<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;

class EventManagement extends Component
{
    public Event $event;

    public bool $showFormModal = false;

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

    public function create_event(): void
    {
        $this->validate();

        $this->event->owner()
            ->associate(auth()->user())
            ->save();

        $this->event = new Event();
    }

    public function render()
    {
        return view('livewire.event-management');
    }
}
