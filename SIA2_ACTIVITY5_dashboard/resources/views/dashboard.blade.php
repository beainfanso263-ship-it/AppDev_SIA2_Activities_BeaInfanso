<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $dashboardTitle }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-bold mb-4">User Profile</h3>
                <p><strong>Full Name:</strong> {{ auth()->user()->name }}</p>
                <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
                <p><strong>Role:</strong> {{ ucfirst(auth()->user()->role) }}</p>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-bold mb-4">Registered Users From API</h3>

                <div class="mb-4">
                    <input
                        type="text"
                        id="user-search"
                        placeholder="Search by name, email, or role..."
                        class="w-full border border-gray-300 rounded-lg px-4 py-2"
                    >
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full border border-gray-300">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="border px-4 py-2">ID</th>
                                <th class="border px-4 py-2">Name</th>
                                <th class="border px-4 py-2">Email</th>
                                <th class="border px-4 py-2">Role</th>
                            </tr>
                        </thead>
                        <tbody id="users-table-body">
                            <tr>
                                <td colspan="4" class="border px-4 py-2 text-center">Loading users...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
    <h3 class="text-lg font-bold mb-4">Public Weather Data for Event Planning</h3>

    @if($weather)
        <div class="border rounded-xl p-5 shadow-sm bg-blue-50 mb-6">
            <p class="text-sm text-gray-600 mb-1">Location</p>
            <h4 class="text-xl font-bold mb-3">{{ $weather['location'] }}</h4>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <p class="text-sm text-gray-600">Current Temperature</p>
                    <p class="text-2xl font-bold">{{ $weather['temperature'] }}°C</p>
                </div>

                <div>
                    <p class="text-sm text-gray-600">Condition</p>
                    <p class="text-lg font-semibold">{{ $weather['condition'] }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-600">Wind Speed</p>
                    <p class="text-lg font-semibold">{{ $weather['wind_speed'] }} km/h</p>
                </div>
            </div>
        </div>

        <h4 class="text-md font-bold mb-3">5-Day Forecast</h4>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($forecast as $day)
                <div class="border rounded-xl p-5 shadow-sm bg-white">
                    <p class="text-sm text-blue-600 font-semibold mb-2">{{ $day['date'] }}</p>
                    <p class="text-lg font-bold mb-2">{{ $day['condition'] }}</p>
                    <p class="text-sm text-gray-700">Max Temp: {{ $day['max_temp'] }}°C</p>
                    <p class="text-sm text-gray-700">Min Temp: {{ $day['min_temp'] }}°C</p>
                    <p class="text-sm text-gray-700">Rain: {{ $day['rain'] }} mm</p>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-red-600">Unable to load weather forecast.</p>
    @endif
</div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tableBody = document.getElementById('users-table-body');
            const searchInput = document.getElementById('user-search');

            let allUsers = [];

            function renderUsers(users) {
                tableBody.innerHTML = '';

                if (users.length === 0) {
                    tableBody.innerHTML = `
                        <tr>
                            <td colspan="4" class="border px-4 py-2 text-center text-red-600">
                                No users found.
                            </td>
                        </tr>
                    `;
                    return;
                }

                users.forEach(user => {
                    tableBody.innerHTML += `
                        <tr>
                            <td class="border px-4 py-2">${user.id}</td>
                            <td class="border px-4 py-2">${user.name}</td>
                            <td class="border px-4 py-2">${user.email}</td>
                            <td class="border px-4 py-2">${user.role}</td>
                        </tr>
                    `;
                });
            }

            fetch('http://127.0.0.1:8000/api/users', {
                headers: {
                    'Accept': 'application/json'
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Failed to fetch users');
                }
                return response.json();
            })
            .then(data => {
                allUsers = data;
                renderUsers(allUsers);
            })
            .catch(error => {
                tableBody.innerHTML = `
                    <tr>
                        <td colspan="4" class="border px-4 py-2 text-center text-red-600">
                            Failed to load users.
                        </td>
                    </tr>
                `;
                console.error(error);
            });

            searchInput.addEventListener('input', function () {
                const keyword = this.value.toLowerCase();

                const filteredUsers = allUsers.filter(user =>
                    user.name.toLowerCase().includes(keyword) ||
                    user.email.toLowerCase().includes(keyword) ||
                    user.role.toLowerCase().includes(keyword)
                );

                renderUsers(filteredUsers);
            });
        });
    </script>
</x-app-layout>