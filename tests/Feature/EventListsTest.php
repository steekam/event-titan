<?php

namespace Tests\Feature;

use App\Models\Event;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class EventListsTest extends TestCase
{
    use RefreshDatabase;

    public function test_is_rendered_in_dashboard(): void
    {
        $this->actingAs(User::factory()->create());
        $this->get('/dashboard')
            ->assertSeeLivewire('event-lists');
    }

    public function test_has_user_created_events(): void
    {
        $this->actingAs($user = User::factory()->create());

        $user->events()->saveMany(Event::factory(5)->make());

        $component = Livewire::test('event-lists');

    }
}
