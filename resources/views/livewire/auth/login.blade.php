<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

new class extends Component
{
    public string $identifier = '';
    public string $password = '';
    public bool $remember = false;

    protected function rules(): array
    {
        return [
            'identifier' => ['required', 'string'],
            'password' => ['required', 'string'],
        ];
    }

    public function login(): void
    {
        $this->validate();

        $identifier = trim($this->identifier);
        $password = $this->password;

        $user = filter_var($identifier, FILTER_VALIDATE_EMAIL)
            ? User::where('email', $identifier)->first()
            : User::where('login_id', strtoupper($identifier))->first();

        if (! $user || ! Hash::check($password, $user->password)) {
            throw ValidationException::withMessages([
                'identifier' => 'These credentials do not match our records.',
            ]);
        }

        Auth::login($user, $this->remember);

        request()->session()->regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }
};

?>

<x-layouts::auth>
    <div class="flex flex-col gap-6">
        <div class="text-center">
            <h1 class="text-3xl font-bold text-white">Log in to your account</h1>
            <p class="mt-2 text-sm text-zinc-400">
                Enter your User ID or email and password below to log in
            </p>
        </div>

        @if (session('status'))
            <div class="rounded-xl border border-green-700 bg-green-950/40 px-4 py-3 text-center text-green-300">
                {{ session('status') }}
            </div>
        @endif

        <form wire:submit.prevent="login" class="flex flex-col gap-6">
            <div>
                <label for="identifier" class="mb-2 block text-sm font-medium text-white">
                    User ID or Email address
                </label>
                <input
                    id="identifier"
                    type="text"
                    wire:model.defer="identifier"
                    placeholder="Enter your User ID or email"
                    class="w-full rounded-xl border border-zinc-700 bg-zinc-900 px-4 py-3 text-white placeholder-zinc-400 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20"
                >
                @error('identifier')
                    <span class="mt-2 block text-sm text-red-400">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <div class="mb-2 flex items-center justify-between">
                    <label for="password" class="block text-sm font-medium text-white">
                        Password
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-white underline" wire:navigate>
                            Forgot your password?
                        </a>
                    @endif
                </div>

                <input
                    id="password"
                    type="password"
                    wire:model.defer="password"
                    placeholder="Password"
                    class="w-full rounded-xl border border-zinc-700 bg-zinc-900 px-4 py-3 text-white placeholder-zinc-400 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20"
                >
                @error('password')
                    <span class="mt-2 block text-sm text-red-400">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex items-center gap-2">
                <input
                    id="remember"
                    type="checkbox"
                    wire:model="remember"
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

        <div class="text-center text-sm text-zinc-400">
            <span>Don't have an account?</span>
            <a href="{{ route('home') }}" class="font-medium text-white underline" wire:navigate>
                Sign up
            </a>
        </div>
    </div>
</x-layouts::auth>