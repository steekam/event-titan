<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        Event::factory(3)->create([
            'user_id' => User::factory()->create()->id,
        ]);
    }
}
