@extends('welcome')
@section('content')
    <div class="w-100 flex flex-wrap justify-around">
        @foreach($workers as $worker)
            <div class="m-3">
                @include('components.card-worker')
            </div>
        @endforeach
    </div>
@endsection
