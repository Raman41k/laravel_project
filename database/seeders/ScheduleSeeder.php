<?php

namespace Database\Seeders;

use App\Models\Schedule;
use App\Models\Worker;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        Schedule::factory()->count(7)->create();
        $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

        // Get all workers
        $workers = Worker::all();

        foreach ($workers as $worker) {
            foreach ($daysOfWeek as $day) {
                $schedule = new Schedule();
                $schedule->worker_id = $worker->id;
                $schedule->day_of_week = $day;
                $schedule->start_time = Carbon::createFromTime(rand(8, 21), rand(0, 59))->format('H:i:s');
                $schedule->end_time = Carbon::createFromTime(rand(9, 22), rand(0, 59))->format('H:i:s');
                $schedule->save();
            }
        }
    }
}
