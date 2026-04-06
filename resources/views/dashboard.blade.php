<x-layouts::app :title="__('User Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl p-6">
        <h1 class="text-3xl font-bold">User Dashboard</h1>

        @if (session()->has('success'))
            <div class="rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-green-800 dark:border-green-800 dark:bg-green-950/40 dark:text-green-300">
                {{ session('success') }}
            </div>
        @endif

        <div class="rounded-xl border border-neutral-200 bg-white p-6 dark:border-neutral-700 dark:bg-neutral-900">
            <p><strong>Name:</strong> {{ auth()->user()->name }}</p>
            <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
            <p><strong>Role:</strong> {{ auth()->user()->role }}</p>
            <p><strong>User ID:</strong> {{ auth()->user()->login_id }}</p>
        </div>

        @if (auth()->user()->application)
            <div class="rounded-xl border border-neutral-200 bg-white p-6 dark:border-neutral-700 dark:bg-neutral-900">
                <h2 class="mb-4 text-xl font-semibold">Submitted Registration Data</h2>

                <div class="grid grid-cols-1 gap-3 md:grid-cols-2">
                    <p><strong>Phone:</strong> {{ auth()->user()->application->phone }}</p>
                    <p><strong>Address:</strong> {{ auth()->user()->application->address }}</p>
                    <p><strong>Date of Birth:</strong> {{ auth()->user()->application->date_of_birth }}</p>
                    <p><strong>Gender:</strong> {{ auth()->user()->application->gender }}</p>
                    <p><strong>Institution:</strong> {{ auth()->user()->application->institution }}</p>
                    <p><strong>Department:</strong> {{ auth()->user()->application->department }}</p>
                    <p><strong>Semester:</strong> {{ auth()->user()->application->semester }}</p>
                    <p><strong>Skills:</strong> {{ auth()->user()->application->skills }}</p>
                </div>
            </div>
        @endif

        <div class="flex gap-4">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="rounded bg-red-600 px-4 py-2 text-white">
                    Logout
                </button>
            </form>
        </div>
    </div>
</x-layouts::app>