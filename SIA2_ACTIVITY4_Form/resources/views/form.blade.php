<!DOCTYPE html>
<html>
<head>
    <title>Event Booking Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-slate-100 via-blue-50 to-emerald-50 min-h-screen text-slate-800">

<div class="max-w-4xl mx-auto py-12 px-4">
    <div class="bg-white/95 backdrop-blur-sm border border-slate-200 rounded-2xl shadow-xl p-8 md:p-10">

        <!-- Header -->
        <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-10">
            <div>
                <h2 class="text-4xl font-bold tracking-tight text-slate-800">
                    Event Booking Form
                </h2>
                <p class="text-slate-500 mt-2 text-sm md:text-base">
                    Complete the form below to reserve your event schedule.
                </p>
            </div>

            <a href="/bookings"
               class="inline-flex items-center justify-center gap-2 bg-emerald-500 hover:bg-emerald-600 text-white font-medium px-6 py-3 rounded-xl shadow-md transition duration-200 no-underline">
                <span>📋</span>
                <span>View Bookings</span>
            </a>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-xl mb-6">
                {{ session('success') }}
            </div>
        @endif

        <!-- Error Messages -->
        @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl mb-6">
                <ul class="list-disc ml-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form -->
        <form action="/submit-booking" method="POST" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Name -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Full Name</label>
                    <input type="text" name="name"
                        class="w-full px-4 py-3 border border-slate-300 rounded-xl bg-white focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400 outline-none transition"
                        placeholder="Enter your full name"
                        value="{{ old('name') }}">
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Email</label>
                    <input type="email" name="email"
                        class="w-full px-4 py-3 border border-slate-300 rounded-xl bg-white focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400 outline-none transition"
                        placeholder="Enter your email"
                        value="{{ old('email') }}">
                </div>

                <!-- Age -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Age</label>
                    <input type="number" name="age"
                        class="w-full px-4 py-3 border border-slate-300 rounded-xl bg-white focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400 outline-none transition"
                        placeholder="Enter your age"
                        value="{{ old('age') }}">
                </div>

                <!-- Event Type -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Event Type</label>
                    <select name="event_type"
                        class="w-full px-4 py-3 border border-slate-300 rounded-xl bg-white focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400 outline-none transition">
                        <option value="">Select Event</option>
                        <option value="seminar">Seminar</option>
                        <option value="birthday">Birthday</option>
                        <option value="wedding">Wedding</option>
                    </select>
                </div>

                <!-- Event Date -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Event Date</label>
                    <input type="date" name="event_date"
                        class="w-full px-4 py-3 border border-slate-300 rounded-xl bg-white focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400 outline-none transition"
                        value="{{ old('event_date') }}">
                </div>

                <!-- Special Request -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Special Request</label>
                    <textarea name="special_request"
                        class="w-full px-4 py-3 border border-slate-300 rounded-xl bg-white focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400 outline-none transition resize-none"
                        rows="4"
                        placeholder="Write any special request here">{{ old('special_request') }}</textarea>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="pt-2">
                <button type="submit"
                    class="w-full md:w-auto bg-slate-800 hover:bg-slate-900 text-white font-semibold px-8 py-3 rounded-xl shadow-md transition duration-200">
                    Book Event
                </button>
            </div>
        </form>

    </div>
</div>

</body>
</html>