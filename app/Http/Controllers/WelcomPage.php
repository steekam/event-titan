<?php

namespace App\Http\Controllers;

use App\Models\Event;

class WelcomPage extends Controller
{
    public function __invoke()
    {
        return view('welcome', [
            'upcoming_events' => Event::upcoming()->get()
        ]);
    }
}
