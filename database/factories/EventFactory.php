<?php

namespace Database\Factories;

use App\Models\event;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $start_datetime = $this->dateTimeBetween('-1 week', '+1 week');
        $end_datetime = Carbon::parse($start_datetime)->addHours(3);

        return [
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->paragraph(),
            'start_datetime' => $start_datetime,
            'end_datetime' => $end_datetime,
        ];
    }
}
