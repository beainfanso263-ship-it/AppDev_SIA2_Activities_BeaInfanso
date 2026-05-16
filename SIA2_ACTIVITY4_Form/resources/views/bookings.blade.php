<!DOCTYPE html>
<html>
<head>
    <title>View Bookings</title>
    <!-- ✅ PUT IT HERE -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-to-br from-blue-100 via-white to-green-100 min-h-screen flex items-center justify-center">

<div class="max-w-6xl mx-auto mt-10 bg-white p-8 rounded-xl shadow-md">

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">
            All Event Bookings
        </h2>

        <a href="/form" 
           class="bg-gray-700 text-white px-4 py-2 rounded-lg shadow hover:bg-gray-800 transition">
            ⬅ Back to Form
        </a>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">

            <!-- Table Head -->
            <thead class="bg-gray-100">
                <tr>
                    <th class="text-left p-3">Name</th>
                    <th class="text-left p-3">Email</th>
                    <th class="text-left p-3">Age</th>
                    <th class="text-left p-3">Event Type</th>
                    <th class="text-left p-3">Event Date</th>
                    <th class="text-left p-3">Special Request</th>
                </tr>
            </thead>

            <!-- Table Body -->
            <tbody>
                @foreach($bookings as $booking)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="p-3">{{ $booking->name }}</td>
                        <td class="p-3">{{ $booking->email }}</td>
                        <td class="p-3">{{ $booking->age }}</td>
                        <td class="p-3 capitalize">{{ $booking->event_type }}</td>
                        <td class="p-3">{{ $booking->event_date }}</td>
                        <td class="p-3">{{ $booking->special_request }}</td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>

</div>