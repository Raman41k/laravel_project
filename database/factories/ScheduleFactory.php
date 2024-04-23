<?php

namespace Database\Factories;

use App\Models\Schedule;
use App\Models\Worker;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        $workers = Worker::all();

        $schedules = [];
        foreach ($workers as $worker) {
            foreach ($daysOfWeek as $day) {
                $schedules[] = [
                    'worker_id' => $worker->id,
                    'day_of_week' => $day,
                    'start_time' => $this->faker->time('H:i'),
                    'end_time' => $this->faker->time('H:i'),
                ];
            }
        }

        return $schedules;
    }
}
