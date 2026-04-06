<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="min-h-screen bg-neutral-100 text-neutral-900 dark:bg-neutral-950 dark:text-white">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold">Role Based System Multi Step Form</h1>
                <p class="mt-1 text-sm text-neutral-600 dark:text-neutral-400">
                    Complete the registration form to receive your User ID and temporary password.
                </p>
            </div>

            <div>
            <a href="{{ route('signin') }}" class="rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">
                Already a member? Sign in
            </a>
            </div>
        </div>

        @if (session('status'))
            <div class="mb-6 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-green-800 dark:border-green-800 dark:bg-green-950/40 dark:text-green-300">
                {{ session('status') }}
            </div>
        @endif

        <livewire:multi-step-form />
    </div>

    @livewireScripts
</body>
</html>