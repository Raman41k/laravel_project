<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
<div class="container mx-auto py-8">
    <a href="{{ route('cpanel') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Cpanel</a>
</div>
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6 text-center">Orders by time</h1>

    @foreach($groupedOrders as $key => $group)
        @php
            [$workerId, $dayOfWeek] = explode('-', $key);
        @endphp
        <h2 class="text-xl font-semibold mb-4">Worker ID: {{ $workerId }}</h2>
        <h3 class="text-lg font-semibold mb-2">Day of the Week: {{ $dayOfWeek }}</h3>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mb-8">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Company name</th>
                    <th scope="col" class="px-6 py-3">User</th>
                    <th scope="col" class="px-6 py-3">Worker</th>
                    <th scope="col" class="px-6 py-3">Service</th>
                    <th scope="col" class="px-6 py-3">Price</th>
                    <th scope="col" class="px-6 py-3">Date</th>
                </tr>
                </thead>
                <tbody>
                @foreach($group as $order)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">{{ $order->company->name }}</td>
                        <td class="px-6 py-4">{{ $order->user->name }}</td>
                        <td class="px-6 py-4">{{ $order->worker->name }}</td>
                        <td class="px-6 py-4">{{ $order->service->name }}</td>
                        <td class="px-6 py-4">{{ $order->service->price }} UAH</td>
                        <td class="px-6 py-4">{{ $order->timeslot }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endforeach
</div>
</body>
</html>
