<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Vacation;
use App\Models\Worker;

class ApiController extends Controller
{
    public function workers()
    {
        $workers = Worker::all();
        return response()->json(['data' => $workers]);
    }

    public function services()
    {
        $services = Service::all();
        return response()->json(['data' => $services]);
    }

    public function vacations()
    {
        $vacations = Vacation::all();
        return response()->json(['data' => $vacations]);
    }
}
