<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class EventManagement extends Component
{
    use AuthorizesRequests;

    public Event $event;

    public bool $editingMode;

    protected $rules = [
        'event.title' => ['required'],
        'event.description' => ['required'],
        'event.start_datetime' => ['required', 'date', "after_or_equal:today"],
        'event.end_datetime' => ['required', 'date', 'after:event.start_datetime'],
    ];

    public function mount(Event $event): void
    {
        $this->event = $event;

        $this->editingMode = $this->event->exists;
    }

    public function save_details()
    {
        $this->validate();

        if ($this->editingMode) {
            $this->authorize('manageEvent', $this->event);
        } else {
            $this->event->owner()->associate(auth()->user());
        }

        $this->event->save();

        $this->event = new Event();

        session()->flash('flash.bannerStyle', 'success');
        session()->flash('flash.banner', $this->editingMode ? 'Event successfully updated.' : 'Event successfully created.');

        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.event-management');
    }
}
