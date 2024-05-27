<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Orders</title>
</head>
<body>
<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">
                Company name
            </th>
            <th scope="col" class="px-6 py-3">
                Worker
            </th>
            <th scope="col" class="px-6 py-3">
                User
            </th>
            <th scope="col" class="px-6 py-3">
                Service
            </th>
            <th scope="col" class="px-6 py-3">
                Price
            </th>
            <th scope="col" class="px-6 py-3">
                Date
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $order->company->name }}
                </th>
                <td class="px-6 py-4">
                    {{ $order->worker->name }}
                </td>
                <td class="px-6 py-4">
                    {{ $order->user->name }}
                </td>
                <td class="px-6 py-4">
                    {{ $order->service->name }}
                </td>
                <td class="px-6 py-4">
                    {{ $order->service->price }} UAH
                </td>
                <td class="px-6 py-4">
                    {{ $order->timeslot }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="container mx-auto py-8">
        <a href="{{ route('cpanel.schedules') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Sort date</a>
    </div>

    <div class="container mx-auto py-8">
        <a href="{{ route('cpanel.workers') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Sort workers</a>
    </div>
</div>
</body>
</html>
