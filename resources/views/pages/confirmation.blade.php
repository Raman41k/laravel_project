@extends('welcome')
@section('content')
   <h1 class="text-center my-6">Confirmation</h1>

   <div class="mx-auto my-3 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
       <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $worker->name }}</h5>
       <p class="font-normal text-center text-gray-700 dark:text-gray-400">{{ $worker->age }}</p>
   </div>

   <div class="mx-auto my-3 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
       <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $service->name }}</h5>
       <p class="font-normal text-center text-gray-700 dark:text-gray-400">{{ $service->age }}</p>
   </div>

   <div>
       <div class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-blue-600 border-blue-600 dark:hover:text-white dark:border-blue-500 dark:peer-checked:border-blue-500 peer-checked:border-blue-600 peer-checked:bg-blue-600 hover:text-white peer-checked:text-white hover:bg-blue-500 dark:text-blue-500 dark:bg-gray-900 dark:hover:bg-blue-600 dark:hover:border-blue-600 dark:peer-checked:bg-blue-500">
           {{ date('d/m/Y H:i', strtotime($schedule->date)) }}
       </div>
   </div>

@endsection
