<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class DeleteEvent extends Component
{
    use AuthorizesRequests;

    public bool $confirmingEventDeletion = false;

    public Event $event;

    public function mount(Event $event) {
        $this->event = $event;
    }

    public function deleteEvent()
    {
        $this->authorize('manageEvent', $this->event);

        $this->event->delete();

        session()->flash('flash.bannerStyle', 'success');
        session()->flash('flash.banner', 'Event has been deleted successfully.');

        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.delete-event');
    }
}
