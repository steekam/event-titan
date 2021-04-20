<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Default test user
        if (!User::whereEmail('test@mail.com')->exists()) {
            User::factory()->create([
                'name' => 'Kamau Wanyee',
                'email' => 'test@mail.com'
            ]);
        }
    }
}
