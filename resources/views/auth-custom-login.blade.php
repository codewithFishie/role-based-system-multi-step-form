<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-black text-white">
    <div class="mx-auto flex min-h-screen max-w-md items-center justify-center px-6">
        <div class="w-full">
            <div class="mb-8 text-center">
                <h1 class="text-4xl font-bold">Log in to your account</h1>
                <p class="mt-3 text-sm text-zinc-400">
                    Enter your User ID or email and password below to log in
                </p>
            </div>

            @if (session('status'))
                <div class="mb-6 rounded-xl border border-green-700 bg-green-950/40 px-4 py-3 text-center text-green-300">
                    {{ session('status') }}
                </div>
            @endif

            @if (session('success'))
                <div class="mb-6 rounded-xl border border-green-700 bg-green-950/40 px-4 py-3 text-center text-green-300">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('signin.store') }}" class="flex flex-col gap-6">
                @csrf

                <div>
                    <label for="identifier" class="mb-2 block text-sm font-medium text-white">
                        User ID or Email address
                    </label>
                    <input
                        id="identifier"
                        name="identifier"
                        type="text"
                        value="{{ old('identifier') }}"
                        placeholder="Enter your User ID or email"
                        class="w-full rounded-xl border border-zinc-700 bg-zinc-900 px-4 py-3 text-white placeholder-zinc-400 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20"
                        required
                    >
                    @error('identifier')
                        <span class="mt-2 block text-sm text-red-400">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="password" class="mb-2 block text-sm font-medium text-white">
                        Password
                    </label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        placeholder="Password"
                        class="w-full rounded-xl border border-zinc-700 bg-zinc-900 px-4 py-3 text-white placeholder-zinc-400 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20"
                        required
                    >
                    @error('password')
                        <span class="mt-2 block text-sm text-red-400">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex items-center gap-2">
                    <input
                        id="remember"
                        name="remember"
                        type="checkbox"
                        value="1"
                        class="h-4 w-4 rounded border-zinc-600 bg-zinc-900 text-blue-600 focus:ring-blue-500"
                    >
                    <label for="remember" class="text-sm text-white">Remember me</label>
                </div>

                <button
                    type="submit"
                    class="w-full rounded-xl bg-white px-4 py-3 font-medium text-black transition hover:bg-zinc-200"
                >
                    Log in
                </button>
            </form>

            <div class="mt-8 text-center text-sm text-zinc-400">
                <span>Don't have an account?</span>
                <a href="{{ route('home') }}" class="font-medium text-white underline">
                    Sign up
                </a>
            </div>
        </div>
    </div>
</body>
</html>