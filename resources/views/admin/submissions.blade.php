<x-layouts::app :title="__('All User Submissions')">
    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl p-6">
        <div class="flex items-center justify-between">
            <h1 class="text-3xl font-bold">All User Submissions</h1>

            <a href="{{ route('admin.dashboard') }}" class="rounded bg-blue-600 px-4 py-2 text-white">
                Back to Admin Dashboard
            </a>
        </div>

        <div class="overflow-x-auto rounded-xl border border-neutral-200 bg-white dark:border-neutral-700 dark:bg-neutral-900">
            <table class="min-w-full text-sm">
                <thead class="border-b border-neutral-200 dark:border-neutral-700">
                    <tr>
                        <th class="px-4 py-3 text-left">Name</th>
                        <th class="px-4 py-3 text-left">Email</th>
                        <th class="px-4 py-3 text-left">User ID</th>
                        <th class="px-4 py-3 text-left">Phone</th>
                        <th class="px-4 py-3 text-left">Institution</th>
                        <th class="px-4 py-3 text-left">Department</th>
                        <th class="px-4 py-3 text-left">Semester</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($submissions as $submission)
                        <tr class="border-b border-neutral-200 dark:border-neutral-800">
                            <td class="px-4 py-3">{{ $submission->name }}</td>
                            <td class="px-4 py-3">{{ $submission->email }}</td>
                            <td class="px-4 py-3">{{ $submission->login_id }}</td>
                            <td class="px-4 py-3">{{ $submission->phone }}</td>
                            <td class="px-4 py-3">{{ $submission->institution }}</td>
                            <td class="px-4 py-3">{{ $submission->department }}</td>
                            <td class="px-4 py-3">{{ $submission->semester }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-4 py-6 text-center">No submissions found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts::app>