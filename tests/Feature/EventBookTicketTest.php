<?php

namespace Tests\Feature;

use App\Models\Event;
use App\Models\EventBooking;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EventBookTicketTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_book_ticket(): void
    {
        $this->actingAs(User::factory()->create());

        $event = Event::factory()->create([
            'start_datetime' => now()->addDay(),
            'end_datetime' => now()->addDays(2),
            'user_id' => User::factory()->create(),
        ]);

        $this->get(route('events.bookTicket', $event->id))
            ->assertRedirect('/dashboard')
            ->assertSessionHas('flash.banner');

        $booking = EventBooking::first();

        $this->assertNotNull($booking);
        $this->assertEquals($booking->event_id, $event->id);
        $this->assertEquals($booking->user_id, auth()->id());
    }

    public function test_user_cannot_book_ticket_for_passed_event(): void
    {
        $this->actingAs(User::factory()->create());

        $event = Event::factory()->create([
            'start_datetime' => now()->subDays(3),
            'end_datetime' => now()->subDays(2),
            'user_id' => User::factory()->create(),
        ]);

        $this->get(route('events.bookTicket', $event->id))
            ->assertStatus(403);

        $booking = EventBooking::first();

        $this->assertNull($booking);
    }
}
