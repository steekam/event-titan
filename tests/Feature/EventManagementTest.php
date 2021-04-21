<?php

namespace Tests\Feature;

use App\Http\Livewire\Events;
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

    public function test_authenticated_user_can_view_show_page(): void
    {
        $this->actingAs(User::factory()->create())
            ->get('/events')
            ->assertOk();
    }

    public function test_unauthenticated_user_cannot_view_show_page(): void
    {
        $this->get('/events')
            ->assertRedirect('/login');
    }

    public function test_user_can_create_event(): void
    {
        $this->actingAs(User::factory()->create());

        Livewire::test(Events\Form::class)
            ->set('event.title', 'Programming 101')
            ->set('event.description', 'This is a test event description.')
            ->set('event.start_datetime', now())
            ->set('event.end_datetime', now()->addHours(3))
            ->call('create_event')
            ->assertNotSet('event.title', 'Programming 101');

        $this->assertTrue(Event::whereTitle('Programming 101')->exists());
    }

    public function test_start_datetime_is_validated_to_be_after_or_equal_today(): void
    {
        $this->actingAs(User::factory()->create());

        Livewire::test(Events\Form::class)
            ->set('event.title', 'Programming 101')
            ->set('event.description', 'This is a test event description.')
            ->set('event.start_datetime', now()->subDays(2))
            ->set('event.end_datetime', now()->addHours(3))
            ->call('create_event')
            ->assertHasErrors(['event.start_datetime' => 'after_or_equal']);

        $this->assertFalse(Event::whereTitle('Programming 101')->exists());
    }

    public function test_end_datetime_is_validated_to_be_after_start_datetime(): void
    {
        $this->actingAs(User::factory()->create());

        Livewire::test(Events\Form::class)
            ->set('event.title', 'Programming 101')
            ->set('event.description', 'This is a test event description.')
            ->set('event.start_datetime', now())
            ->set('event.end_datetime', now()->subDays(3))
            ->call('create_event')
            ->assertHasErrors(['event.end_datetime' => 'after']);

        $this->assertFalse(Event::whereTitle('Programming 101')->exists());
    }
}
