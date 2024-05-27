<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body class="bg-gray-100">

<div class="container mx-auto py-8">
    <a href="{{ route('cpanel') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Cpanel</a>
</div>

<div class="container mx-auto py-8">
    @foreach ($groupedOrders as $workerId => $workerOrders)
        <h2 class="text-xl font-semibold mb-4">Worker ID: {{ $workerId }}</h2>
        <div class="overflow-x-auto">
            <table class="table-auto w-full border-collapse border border-gray-400">
                <thead>
                <tr class="bg-gray-200 border-b border-gray-400">
                    <th class="px-4 py-2">Day of Week</th>
                    <th class="px-4 py-2">Company Name</th>
                    <th class="px-4 py-2">User Name</th>
                    <th class="px-4 py-2">Worker Name</th>
                    <th class="px-4 py-2">Service Name</th>
                    <th class="px-4 py-2">Price</th>
                    <th class="px-4 py-2">Timeslot</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($workerOrders as $dayOfWeek => $dayOrders)
                    <tr class="border-b border-gray-400">
                        <td class="px-4 py-2">{{ $dayOfWeek }}</td>
                        <td class="px-4 py-2">{{ $dayOrders[0]->company->name }}</td>
                        <td class="px-4 py-2">{{ $dayOrders[0]->user->name }}</td>
                        <td class="px-4 py-2">{{ $dayOrders[0]->worker->name }}</td>
                        <td class="px-4 py-2">{{ $dayOrders[0]->service->name }}</td>
                        <td class="px-4 py-2">{{ $dayOrders[0]->service->price }} UAH</td>
                        <td class="px-4 py-2">{{ $dayOrders[0]->timeslot }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endforeach
</div>
</body>

</html>
