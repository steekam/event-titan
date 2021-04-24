<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Default test user
        if (!User::whereEmail('test@mail.com')->exists()) {
            $user = User::factory()->create([
                'name' => 'Kamau Wanyee',
                'email' => 'test@mail.com'
            ]);

            // Events
            $user->events()->saveMany(Event::factory(5)->make());
        }
    }
}
