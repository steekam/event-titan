<?php

namespace App\Policies;

use App\Models\Event;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EventPolicy
{
    use HandlesAuthorization;

    public function manageEvent(User $user, Event $event)
    {
        return $event->user_id == $user->id;
    }

    public function bookTicket(User $user, Event $event)
    {
        return $event->user_id != $user->id &&
            !$event->hasPassed() &&
            $user->hasNotBookedEvent($event);
    }
}
