@extends('welcome')
@section('content')
    <ul id="timetable" class="grid w-full grid-cols-1 gap-2 mt-5">
        @foreach($schedules as $schedule)
            <li>
                <a href="{{ route('services.confirmation', ['schedule' => $schedule]) }}" class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-blue-600 border-blue-600 dark:hover:text-white dark:border-blue-500 dark:peer-checked:border-blue-500 peer-checked:border-blue-600 peer-checked:bg-blue-600 hover:text-white peer-checked:text-white hover:bg-blue-500 dark:text-blue-500 dark:bg-gray-900 dark:hover:bg-blue-600 dark:hover:border-blue-600 dark:peer-checked:bg-blue-500">
                    {{ date('H:i', strtotime($schedule->start_time)) }} - {{ $schedule->day_of_week }}
                </a>
            </li>
        @endforeach
    </ul>
@endsection
