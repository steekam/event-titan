<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
}
