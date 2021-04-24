<?php

namespace Tests\Feature;

use App\Http\Livewire\EventManagement;
use App\Models\Event;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class EventManagementTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    public function test_user_can_view_event(): void
    {
        $this->actingAs(User::factory()->create());

        $event = Event::factory()->create(['user_id' => auth()->id()]);

        $this->get(route('events.show', $event->id))
            ->assertOk()
            ->assertSee($event->title)
            ->assertSee($event->description);
    }

    public function test_event_owner_can_view_event_actions(): void
    {
        $this->actingAs(User::factory()->create());

        $event = Event::factory()->create(['user_id' => auth()->id()]);

        $event_actions_component = $this->blade('<x-event-actions :event="$event"/>', ['event' => $event]);

        $this->get(route('events.show', $event->id))
            ->assertOk()
            ->assertSee($event_actions_component, false);
    }


    public function test_only_event_owner_can_view_edit_and_delete_actions(): void
    {
        $this->actingAs(User::factory()->create());

        $event = Event::factory()->create(['user_id' => User::factory()->create()->id]);

        $event_actions_component = $this->blade('<x-event-actions :event="$event"', ['event' => $event]);

        $this->get(route('events.show', $event->id))
            ->assertOk()
            ->assertDontSee((string) $event_actions_component);
    }

    public function test_authenticated_user_can_view_create_page(): void
    {
        $this->actingAs(User::factory()->create())
            ->get(route('events.create'))
            ->assertOk();
    }

    public function test_unauthenticated_user_cannot_view_create_page(): void
    {
        $this->get(route('events.create'))
            ->assertRedirect('/login');
    }

    public function test_user_can_create_event(): void
    {
        $this->actingAs(User::factory()->create());

        Livewire::test(EventManagement::class)
            ->set('event.title', 'Programming 101')
            ->set('event.description', 'This is a test event description.')
            ->set('event.start_datetime', now())
            ->set('event.end_datetime', now()->addHours(3))
            ->call('save_details')
            ->assertNotSet('event.title', 'Programming 101')
            ->assertRedirect('/dashboard')
            ->assertSessionHas('flash.banner', 'Event successfully created.')
            ->assertSessionHas('flash.bannerStyle', 'success');

        $this->assertTrue(Event::whereTitle('Programming 101')->exists());
    }

    public function test_start_datetime_is_validated_to_be_after_or_equal_today(): void
    {
        $this->actingAs(User::factory()->create());

        Livewire::test(EventManagement::class)
            ->set('event.title', 'Programming 101')
            ->set('event.description', 'This is a test event description.')
            ->set('event.start_datetime', now()->subDays(2))
            ->set('event.end_datetime', now()->addHours(3))
            ->call('save_details')
            ->assertHasErrors(['event.start_datetime' => 'after_or_equal']);

        $this->assertFalse(Event::whereTitle('Programming 101')->exists());
    }

    public function test_end_datetime_is_validated_to_be_after_start_datetime(): void
    {
        $this->actingAs(User::factory()->create());

        Livewire::test(EventManagement::class)
            ->set('event.title', 'Programming 101')
            ->set('event.description', 'This is a test event description.')
            ->set('event.start_datetime', now())
            ->set('event.end_datetime', now()->subDays(3))
            ->call('save_details')
            ->assertHasErrors(['event.end_datetime' => 'after']);

        $this->assertFalse(Event::whereTitle('Programming 101')->exists());
    }

    public function test_event_owner_is_authorized_to_view_edit_route(): void
    {
        $this->actingAs(User::factory()->create());

        $event = Event::factory()->create(['user_id' => auth()->id()]);

        $this->get(route('events.edit', $event->id))
            ->assertOk();
    }

    public function test_only_event_owner_is_authorized_to_view_edit_route(): void
    {
        $this->actingAs(User::factory()->create());

        $event = Event::factory()->create(['user_id' => User::factory()->create()->id]);

        $this->get(route('events.edit', $event->id))
            ->assertStatus(403);
    }

    public function test_owner_can_update_event(): void
    {
        $this->actingAs(User::factory()->create());

        /** @var Event */
        $event = Event::factory()->create(['user_id' => auth()->id()]);

        Livewire::test(EventManagement::class, ['event' => $event])
            ->assertSet('event.title', $event->title)
            ->assertSet('event.description', $event->description)
            ->set('event.title', 'Updated event title')
            ->set('event.description', 'This is a new description')
            ->set('event.start_datetime', now()->addDay())
            ->set('event.end_datetime', now()->addDays(4))
            ->call('save_details')
            ->assertSessionHas('flash.bannerStyle', 'success')
            ->assertSessionHas('flash.banner', 'Event successfully updated.');

        $event->refresh();

        $this->assertSame('Updated event title', $event->title);
        $this->assertSame('This is a new description', $event->description);
    }

}
