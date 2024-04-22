@extends('welcome')
@section('content')
    <div class="bg-white p-4 rounded-lg shadow-lg">
        <h2 class="text-lg font-bold mb-4">Time Slots</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($timeslots as $timeslot)
                @if($timeslot['time_slots'])
                    <div class="border border-gray-200 rounded-lg p-4">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-gray-700 font-semibold">{{ $timeslot['day'] }}</span>
                        </div>
                        <div class="grid grid-cols-3 gap-2">
                            @foreach ($timeslot['time_slots'] as $time)
                                <button class="bg-blue-100 rounded-lg p-2 text-center">
                                    <a href="{{ route('services.confirmation', ['schedule' => $timeslot['id']]) }}"
                                       class="text-blue-500">{{ $time['start_time'] }}</a>
                                </button>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
