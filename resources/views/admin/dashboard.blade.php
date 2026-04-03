<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="max-w-5xl mx-auto py-10 px-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Admin Dashboard</h1>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded">
                    Logout
                </button>
            </form>
        </div>

        <div class="bg-white shadow rounded p-6">
            <p class="mb-2"><strong>Name:</strong> {{ auth()->user()->name }}</p>
            <p class="mb-2"><strong>Email:</strong> {{ auth()->user()->email }}</p>
            <p class="mb-2"><strong>Role:</strong> {{ auth()->user()->role }}</p>
            <p class="mb-2"><strong>Custom User ID:</strong> {{ auth()->user()->custom_user_id }}</p>
        </div>
    </div>
</body>
</html>