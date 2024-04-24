<?php

namespace Database\Seeders;

use App\Models\Vacation;
use App\Models\Worker;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VacationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $worker = Worker::find(1);
        $vacations_days = [1,2,3,4,14];

        $vacation = new Vacation();
        $vacation->worker_id = $worker->id;
        $vacation->start_date =  Carbon::now()->addDays(2);
        $vacation->days = array_rand($vacations_days);
        $vacation->save();
    }
}
