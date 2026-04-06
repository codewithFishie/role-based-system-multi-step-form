<x-layouts::app :title="__('Admin Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl p-6">
        <h1 class="text-3xl font-bold">Admin Dashboard</h1>

        <div class="rounded-xl border border-neutral-200 bg-white p-6 dark:border-neutral-700 dark:bg-neutral-900">
            <p><strong>Name:</strong> {{ auth()->user()->name }}</p>
            <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
            <p><strong>Role:</strong> {{ auth()->user()->role }}</p>
        </div>

        <div class="flex gap-4">
            <a href="{{ route('dashboard') }}" class="rounded bg-blue-600 px-4 py-2 text-white">
                Main Dashboard
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="rounded bg-red-600 px-4 py-2 text-white">
                    Logout
                </button>
            </form>
        </div>
    </div>
</x-layouts::app>