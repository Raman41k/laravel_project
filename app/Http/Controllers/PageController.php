<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Service;
use App\Models\Worker;
use Carbon\Carbon;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\View\View;
use DateTime;

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
//        $schedules = Schedule::query()->where('worker_id', '=', $worker->id)->get();
        $vacationDates = [];
        $lastVacation = $worker->vacations->first();

        if ($lastVacation) {
            $startDate = new DateTime($lastVacation->start_date);
            $vacationDates[] = $startDate->format('Y-m-d');

            for ($i = 1; $i < $lastVacation->days; $i++) {
                $nextDate = clone $startDate;
                $nextDate->modify("+{$i} day");
                $vacationDates[] = $nextDate->format('Y-m-d');
            }
        }
//        foreach ($schedules as $schedule) {
//            $start = new DateTime($schedule->start_time);
//            $end = new DateTime($schedule->end_time);
//            $dayOfWeek = $schedule->day_of_week;
//            $timeSlots = $this->getTimeSlots($service->duration, $start, $end);
//
//            $timeslots[] = [
//                'id' => $schedule->id,
//                'day' => $dayOfWeek,
//                'time_slots' => $timeSlots,
//            ];
//        }
        $cookie = cookie('worker_id', $worker->id);

        return response()
            ->view('pages.schedules', compact( 'vacationDates', 'service', 'worker'))
            ->withCookie($cookie);
    }

    public function confirmation()
    {
        $worker_id = request()->cookie('worker_id');
        $service_id = request()->cookie('service_id');
        $schedule_id = request()->cookie('schedule_id');

        $worker = Worker::findOrFail($worker_id);
        $service = Service::findOrFail($service_id);
        $schedule = Schedule::findOrFail($schedule_id);

        return view('pages.confirmation', compact('schedule', 'worker', 'service'));
    }

    private function getTimeSlots(int $interval, DateTime $start, DateTime $end): array
    {
        $startTime = $start->format('H:i');//00:00
        $endTime = $end->format('H:i');
        $timeSlots = [];

        while (strtotime($startTime) <= strtotime($endTime)) {
            $start = $startTime;
            $followingTime = strtotime('+' . $interval . 'minutes', strtotime($startTime));
            $end = date('H:i', $followingTime);
            $startTime = date('H:i', $followingTime);

            if (strtotime($startTime) <= strtotime($endTime)) {

                $timeSlots[] = [
                    'start_time' => $start,
                    'end_time' => $end,
                ];
            }
        }

        return $timeSlots;
    }

    public function postSchedule(Request $request)
    {
        date_default_timezone_set('Europe/Kiev');
        if ($request->ajax()) {
            $worker_id = request()->cookie('worker_id');

            $dateString = $request->date;
            $date = DateTime::createFromFormat('d/m/Y H:i', $dateString, new DateTimeZone('Europe/Kiev'));

            $schedule = Schedule::create([
                'worker_id' => $worker_id,
                'date' => $date,
            ]);

            $cookie = cookie('schedule_id', $schedule->id);

            return redirect()->route('services.confirmation')->withCookie($cookie);
        } else {
            abort(400, 'Bad request');
        }
    }
}
