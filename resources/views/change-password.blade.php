<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-black text-white">
    <div class="mx-auto flex min-h-screen max-w-md items-center justify-center px-6">
        <div class="w-full">
            <div class="mb-8 text-center">
                <h1 class="text-4xl font-bold">Change Password</h1>
                <p class="mt-3 text-sm text-zinc-400">
                    Update your password securely.
                </p>
            </div>

            <form method="POST" action="{{ route('password.change.store') }}" class="flex flex-col gap-6">
                @csrf

                <div>
                    <label for="current_password" class="mb-2 block text-sm font-medium text-white">
                        Current Password
                    </label>
                    <input
                        id="current_password"
                        name="current_password"
                        type="password"
                        class="w-full rounded-xl border border-zinc-700 bg-zinc-900 px-4 py-3 text-white outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20"
                        required
                    >
                    @error('current_password')
                        <span class="mt-2 block text-sm text-red-400">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="password" class="mb-2 block text-sm font-medium text-white">
                        New Password
                    </label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        class="w-full rounded-xl border border-zinc-700 bg-zinc-900 px-4 py-3 text-white outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20"
                        required
                    >
                    @error('password')
                        <span class="mt-2 block text-sm text-red-400">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="mb-2 block text-sm font-medium text-white">
                        Confirm New Password
                    </label>
                    <input
                        id="password_confirmation"
                        name="password_confirmation"
                        type="password"
                        class="w-full rounded-xl border border-zinc-700 bg-zinc-900 px-4 py-3 text-white outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20"
                        required
                    >
                </div>

                <button
                    type="submit"
                    class="w-full rounded-xl bg-white px-4 py-3 font-medium text-black transition hover:bg-zinc-200"
                >
                    Update Password
                </button>
            </form>
        </div>
    </div>
</body>
</html>