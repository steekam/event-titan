<?php

namespace Tests\Feature;

use App\Models\Event;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire;
use Tests\TestCase;

class DeleteEventTest extends TestCase
{
    use RefreshDatabase;

    public function test_event_owner_can_delete_event(): void
    {
        $this->actingAs($user = User::factory()->create());

        $event = Event::factory()->create(['user_id' => $user->id]);

        Livewire::test('delete-event', ['event' => $event])
            ->call('deleteEvent')
            ->assertRedirect('/dashboard')
            ->assertSessionHas('flash.banner', 'Event has been deleted successfully.');

        $event->refresh();

        $this->assertTrue($event->trashed());
    }


}
