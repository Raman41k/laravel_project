@extends('welcome')
@section('content')
    @include('flatpickr::components.style')
    @include('flatpickr::components.script')
{{--    <div class="bg-white p-4 rounded-lg shadow-lg">--}}
{{--        <h2 class="text-lg font-bold mb-4">Time Slots</h2>--}}
{{--        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">--}}
{{--            @foreach ($timeslots as $timeslot)--}}
{{--                @if($timeslot['time_slots'])--}}
{{--                    <div class="border border-gray-200 rounded-lg p-4">--}}
{{--                        <div class="flex justify-between items-center mb-2">--}}
{{--                            <span class="text-gray-700 font-semibold">{{ $timeslot['day'] }}</span>--}}
{{--                        </div>--}}
{{--                        <div class="grid grid-cols-3 gap-2">--}}
{{--                            @foreach ($timeslot['time_slots'] as $time)--}}
{{--                                <button class="bg-blue-100 rounded-lg p-2 text-center">--}}
{{--                                    <a href="{{ route('services.confirmation', ['schedule' => $timeslot['id']]) }}"--}}
{{--                                       class="text-blue-500">{{ $time['start_time'] }}</a>--}}
{{--                                </button>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="flex justify-center items-center h-[80vh]">
        <x-flatpickr
            id="laravel-flatpickr"
            placeholder="Оберіть дату"
            date-format="d/m/Y"
            :min-date="today()"
            :max-date="today()->addDays(30)"
            show-time
            :disable="$vacationDates"
            min-time="08:00"
            max-time="22:00"
            time-format="H:i"
            alt-format="d/m/y H:i"
            :first-day-of-week="1"
        />
        <button type="submit" id="schedule_submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Підтвердити
        </button>
    </div>

    <script>
        $(document).ready(function() {
            $('#schedule_submit').click(function() {
                const selectedDate = $('#laravel-flatpickr').val();
                const data = {
                    'date': selectedDate,
                    '_token': '{{ csrf_token() }}'
                };

                if (selectedDate) {
                    $.ajax({
                       url: "{{ route('post.schedule') }}",
                       type: 'POST',
                       data: data,
                        success: function () {
                            window.location.href = 'http://127.0.0.1:8000/confirmation';
                        }
                    });
                }
            });
        });
    </script>

@endsection
