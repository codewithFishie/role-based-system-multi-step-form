<x-layouts::app :title="__('Manage Users')">
    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl p-6">
        <div class="flex items-center justify-between">
            <h1 class="text-3xl font-bold">Manage Users</h1>

            <a href="{{ route('admin.dashboard') }}" class="rounded bg-blue-600 px-4 py-2 text-white">
                Back to Admin Dashboard
            </a>
        </div>

        @if (session()->has('success'))
            <div class="rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-green-800 dark:border-green-800 dark:bg-green-950/40 dark:text-green-300">
                {{ session('success') }}
            </div>
        @endif

        @if (session()->has('error'))
            <div class="rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-red-800 dark:border-red-800 dark:bg-red-950/40 dark:text-red-300">
                {{ session('error') }}
            </div>
        @endif

        <div class="overflow-x-auto rounded-xl border border-neutral-200 bg-white dark:border-neutral-700 dark:bg-neutral-900">
            <table class="min-w-full text-sm">
                <thead class="border-b border-neutral-200 dark:border-neutral-700">
                    <tr>
                        <th class="px-4 py-3 text-left">Name</th>
                        <th class="px-4 py-3 text-left">Email</th>
                        <th class="px-4 py-3 text-left">User ID</th>
                        <th class="px-4 py-3 text-left">Role</th>
                        <th class="px-4 py-3 text-left">Main Admin</th>
                        <th class="px-4 py-3 text-left">Blocked</th>
                        <th class="px-4 py-3 text-left">Phone</th>
                        <th class="px-4 py-3 text-left">Institution</th>
                        <th class="px-4 py-3 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr class="border-b border-neutral-200 dark:border-neutral-800">
                            <td class="px-4 py-3">{{ $user->name }}</td>
                            <td class="px-4 py-3">{{ $user->email }}</td>
                            <td class="px-4 py-3">{{ $user->login_id }}</td>
                            <td class="px-4 py-3">{{ ucfirst($user->role) }}</td>
                            <td class="px-4 py-3">{{ $user->is_main_admin ? 'Yes' : 'No' }}</td>
                            <td class="px-4 py-3">{{ $user->is_blocked ? 'Yes' : 'No' }}</td>
                            <td class="px-4 py-3">{{ $user->application->phone ?? '-' }}</td>
                            <td class="px-4 py-3">{{ $user->application->institution ?? '-' }}</td>
                            <td class="px-4 py-3">
                                <div class="flex flex-wrap gap-2">
                                    @if (auth()->user()->id !== $user->id && ! $user->is_main_admin)
                                        @if ($user->role === 'user')
                                            <form method="POST" action="{{ route('admin.users.promote', $user) }}">
                                                @csrf
                                                <button type="submit" class="rounded bg-blue-600 px-3 py-1 text-white">
                                                    Make Admin
                                                </button>
                                            </form>
                                        @endif

                                        @if (auth()->user()->isMainAdmin() && $user->role === 'admin')
                                            <form method="POST" action="{{ route('admin.users.demote', $user) }}">
                                                @csrf
                                                <button type="submit" class="rounded bg-yellow-600 px-3 py-1 text-white">
                                                    Remove Admin
                                                </button>
                                            </form>
                                        @endif

                                        @if (! $user->is_blocked)
                                            <form method="POST" action="{{ route('admin.users.block', $user) }}">
                                                @csrf
                                                <button type="submit" class="rounded bg-orange-600 px-3 py-1 text-white">
                                                    Block
                                                </button>
                                            </form>
                                        @else
                                            <form method="POST" action="{{ route('admin.users.unblock', $user) }}">
                                                @csrf
                                                <button type="submit" class="rounded bg-green-600 px-3 py-1 text-white">
                                                    Unblock
                                                </button>
                                            </form>
                                        @endif

                                        <form method="POST" action="{{ route('admin.users.delete', $user) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="rounded bg-red-600 px-3 py-1 text-white"
                                                onclick="return confirm('Are you sure you want to delete this user?')">
                                                Delete
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-neutral-500">No actions</span>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="px-4 py-6 text-center">No users found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts::app>