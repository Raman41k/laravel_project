@extends('welcome')
@section('content')
    <div class="w-100 flex flex-wrap justify-around">
        @foreach($services as $service)
            <div class="m-3">
                @include('components.card-service')
            </div>
        @endforeach
    </div>
@endsection
