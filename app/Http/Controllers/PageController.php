<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Service;
use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    public function index(): View
    {
        return view('welcome');
    }

    public function workers(): View
    {
        $workers = Worker::all();
        return view('pages.workers', compact('workers'));
    }

    public function services(): View
    {
        $services = Service::all();
        return view('pages.services', compact('services'));
    }

    public function service(Service $service)
    {
        $cookie = cookie('service_id', $service->id);
        $workers = Worker::all();

        return response()
            ->view('pages.workers', compact('workers', 'service'))
            ->withCookie($cookie);
    }

    public function serviceWorker(Service $service, Worker $worker)
    {
        $schedules = Schedule::all()->sort(function ($a, $b) {
            $dayOrder = [
                'Monday' => 1,
                'Tuesday' => 2,
                'Wednesday' => 3,
                'Thursday' => 4,
                'Friday' => 5,
                'Saturday' => 6,
                'Sunday' => 7,
            ];

            $dayComparison = $dayOrder[$a->day_of_week] - $dayOrder[$b->day_of_week];
            if ($dayComparison !== 0) {
                return $dayComparison;
            }

            return strcmp($a->start_time, $b->start_time);
        });

        $cookie = cookie('worker_id', $worker->id);

        return response()
            ->view('pages.schedules', compact('schedules', 'service', 'worker'))
            ->withCookie($cookie);
    }

    public function confirmation(Schedule $schedule)
    {
        $cookie = cookie('schedule_id', $schedule->id);
        $worker_id = request()->cookie('worker_id');
        $service_id = request()->cookie('service_id');

        $worker = Worker::query()->findOrFail($worker_id);
        $service = Service::query()->findOrFail($service_id);

        return response()
            ->view('pages.confirmation', compact('schedule', 'worker', 'service'))
            ->withCookie($cookie);
    }
}
