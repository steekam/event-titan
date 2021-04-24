<?php

namespace App\Http\Livewire;

use App\Models\Event;
use App\Models\EventBooking;
use App\Models\User;
use Livewire\Component;

class EventLists extends Component
{
    public function render()
    {
        /** @var User */
        $user = auth()->user();

        $user->load(['events', 'event_bookings.event']);

        $booked_events = optional($user->event_bookings)
            ->map(fn(EventBooking $event_booking) => $event_booking->event);

        return view('livewire.event-lists', [
            'events' => $user->events,
            'upcoming_events' => Event::upcoming()->where('user_id', '!=' ,auth()->id())->get(),
            'booked_events' => $booked_events ?? collect()
        ]);
    }
}
