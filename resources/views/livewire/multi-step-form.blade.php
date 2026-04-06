<div class="mx-auto max-w-4xl">
    <div class="overflow-hidden rounded-2xl border border-neutral-200 bg-white shadow-sm dark:border-neutral-800 dark:bg-neutral-900">
        <div class="border-b border-neutral-200 px-6 py-5 dark:border-neutral-800">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm font-medium text-neutral-500 dark:text-neutral-400">Registration Progress</p>
                    <p class="mt-1 text-lg font-semibold text-neutral-900 dark:text-white">
                        Step {{ $currentStep }} of 3
                    </p>
                </div>

                <div class="flex items-center gap-3">
                    <div class="flex h-9 w-9 items-center justify-center rounded-full {{ $currentStep >= 1 ? 'bg-blue-600 text-white' : 'bg-neutral-200 text-neutral-500 dark:bg-neutral-800 dark:text-neutral-400' }}">1</div>
                    <div class="h-1 w-8 rounded bg-neutral-200 dark:bg-neutral-800"></div>
                    <div class="flex h-9 w-9 items-center justify-center rounded-full {{ $currentStep >= 2 ? 'bg-blue-600 text-white' : 'bg-neutral-200 text-neutral-500 dark:bg-neutral-800 dark:text-neutral-400' }}">2</div>
                    <div class="h-1 w-8 rounded bg-neutral-200 dark:bg-neutral-800"></div>
                    <div class="flex h-9 w-9 items-center justify-center rounded-full {{ $currentStep >= 3 ? 'bg-blue-600 text-white' : 'bg-neutral-200 text-neutral-500 dark:bg-neutral-800 dark:text-neutral-400' }}">3</div>
                </div>
            </div>
        </div>

        <div class="px-6 py-6">
            @if ($currentStep == 1)
                <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                    <div>
                        <label class="mb-2 block text-sm font-medium text-neutral-800 dark:text-neutral-200">Full Name</label>
                        <input type="text" wire:model="name" placeholder="Enter your full name"
                            class="w-full rounded-xl border border-neutral-300 bg-white px-4 py-3 text-neutral-900 placeholder-neutral-400 shadow-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:placeholder-neutral-500">
                        @error('name') <span class="mt-2 block text-sm text-red-600 dark:text-red-400">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-medium text-neutral-800 dark:text-neutral-200">Email</label>
                        <input type="email" wire:model="email" placeholder="Enter your email address"
                            class="w-full rounded-xl border border-neutral-300 bg-white px-4 py-3 text-neutral-900 placeholder-neutral-400 shadow-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:placeholder-neutral-500">
                        @error('email') <span class="mt-2 block text-sm text-red-600 dark:text-red-400">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-medium text-neutral-800 dark:text-neutral-200">Phone</label>
                        <input type="text" wire:model="phone" placeholder="Enter your phone number"
                            class="w-full rounded-xl border border-neutral-300 bg-white px-4 py-3 text-neutral-900 placeholder-neutral-400 shadow-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:placeholder-neutral-500">
                        @error('phone') <span class="mt-2 block text-sm text-red-600 dark:text-red-400">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-medium text-neutral-800 dark:text-neutral-200">Date of Birth</label>
                        <input type="date" wire:model="date_of_birth"
                            class="w-full rounded-xl border border-neutral-300 bg-white px-4 py-3 text-neutral-900 shadow-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-neutral-700 dark:bg-neutral-950 dark:text-white">
                        @error('date_of_birth') <span class="mt-2 block text-sm text-red-600 dark:text-red-400">{{ $message }}</span> @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label class="mb-2 block text-sm font-medium text-neutral-800 dark:text-neutral-200">Address</label>
                        <input type="text" wire:model="address" placeholder="Enter your full address"
                            class="w-full rounded-xl border border-neutral-300 bg-white px-4 py-3 text-neutral-900 placeholder-neutral-400 shadow-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:placeholder-neutral-500">
                        @error('address') <span class="mt-2 block text-sm text-red-600 dark:text-red-400">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-medium text-neutral-800 dark:text-neutral-200">Gender</label>
                        <select wire:model="gender"
                            class="w-full rounded-xl border border-neutral-300 bg-white px-4 py-3 text-neutral-900 shadow-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-neutral-700 dark:bg-neutral-950 dark:text-white">
                            <option value="">Select gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                        @error('gender') <span class="mt-2 block text-sm text-red-600 dark:text-red-400">{{ $message }}</span> @enderror
                    </div>
                </div>
            @endif

            @if ($currentStep == 2)
                <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                    <div class="md:col-span-2">
                        <label class="mb-2 block text-sm font-medium text-neutral-800 dark:text-neutral-200">Institution</label>
                        <input type="text" wire:model="institution" placeholder="Enter your institution name"
                            class="w-full rounded-xl border border-neutral-300 bg-white px-4 py-3 text-neutral-900 placeholder-neutral-400 shadow-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:placeholder-neutral-500">
                        @error('institution') <span class="mt-2 block text-sm text-red-600 dark:text-red-400">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-medium text-neutral-800 dark:text-neutral-200">Department</label>
                        <input type="text" wire:model="department" placeholder="Enter your department"
                            class="w-full rounded-xl border border-neutral-300 bg-white px-4 py-3 text-neutral-900 placeholder-neutral-400 shadow-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:placeholder-neutral-500">
                        @error('department') <span class="mt-2 block text-sm text-red-600 dark:text-red-400">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-medium text-neutral-800 dark:text-neutral-200">Semester</label>
                        <input type="text" wire:model="semester" placeholder="Enter your semester"
                            class="w-full rounded-xl border border-neutral-300 bg-white px-4 py-3 text-neutral-900 placeholder-neutral-400 shadow-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:placeholder-neutral-500">
                        @error('semester') <span class="mt-2 block text-sm text-red-600 dark:text-red-400">{{ $message }}</span> @enderror
                    </div>
                </div>
            @endif

            @if ($currentStep == 3)
                <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                    <div>
                        <label class="mb-2 block text-sm font-medium text-neutral-800 dark:text-neutral-200">Skills</label>
                        <textarea wire:model="skills" rows="8" placeholder="Write your skills here"
                            class="w-full rounded-xl border border-neutral-300 bg-white px-4 py-3 text-neutral-900 placeholder-neutral-400 shadow-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:placeholder-neutral-500"></textarea>
                        @error('skills') <span class="mt-2 block text-sm text-red-600 dark:text-red-400">{{ $message }}</span> @enderror
                    </div>

                    <div class="rounded-2xl border border-neutral-200 bg-neutral-50 p-5 dark:border-neutral-800 dark:bg-neutral-950">
                        <h2 class="mb-4 text-lg font-semibold text-neutral-900 dark:text-white">Review Information</h2>

                        <div class="space-y-3 text-sm">
                            <div><span class="font-medium text-neutral-700 dark:text-neutral-300">Name:</span> <span class="text-neutral-900 dark:text-white">{{ $name ?: '—' }}</span></div>
                            <div><span class="font-medium text-neutral-700 dark:text-neutral-300">Email:</span> <span class="text-neutral-900 dark:text-white">{{ $email ?: '—' }}</span></div>
                            <div><span class="font-medium text-neutral-700 dark:text-neutral-300">Phone:</span> <span class="text-neutral-900 dark:text-white">{{ $phone ?: '—' }}</span></div>
                            <div><span class="font-medium text-neutral-700 dark:text-neutral-300">Address:</span> <span class="text-neutral-900 dark:text-white">{{ $address ?: '—' }}</span></div>
                            <div><span class="font-medium text-neutral-700 dark:text-neutral-300">Date of Birth:</span> <span class="text-neutral-900 dark:text-white">{{ $date_of_birth ?: '—' }}</span></div>
                            <div><span class="font-medium text-neutral-700 dark:text-neutral-300">Gender:</span> <span class="text-neutral-900 dark:text-white">{{ $gender ?: '—' }}</span></div>
                            <div><span class="font-medium text-neutral-700 dark:text-neutral-300">Institution:</span> <span class="text-neutral-900 dark:text-white">{{ $institution ?: '—' }}</span></div>
                            <div><span class="font-medium text-neutral-700 dark:text-neutral-300">Department:</span> <span class="text-neutral-900 dark:text-white">{{ $department ?: '—' }}</span></div>
                            <div><span class="font-medium text-neutral-700 dark:text-neutral-300">Semester:</span> <span class="text-neutral-900 dark:text-white">{{ $semester ?: '—' }}</span></div>
                            <div><span class="font-medium text-neutral-700 dark:text-neutral-300">Skills:</span> <span class="text-neutral-900 dark:text-white">{{ $skills ?: '—' }}</span></div>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <div class="flex items-center justify-between border-t border-neutral-200 px-6 py-5 dark:border-neutral-800">
            @if ($currentStep > 1)
                <button wire:click="previousStep" type="button"
                    class="rounded-xl bg-neutral-200 px-5 py-2.5 text-sm font-medium text-neutral-800 transition hover:bg-neutral-300 dark:bg-neutral-800 dark:text-white dark:hover:bg-neutral-700">
                    Previous
                </button>
            @else
                <div></div>
            @endif

            @if ($currentStep < 3)
                <button wire:click="nextStep" type="button"
                    class="rounded-xl bg-blue-600 px-5 py-2.5 text-sm font-medium text-white shadow-sm transition hover:bg-blue-700">
                    Next
                </button>
            @else
                <button wire:click="submitForm" type="button"
                    class="rounded-xl bg-green-600 px-5 py-2.5 text-sm font-medium text-white shadow-sm transition hover:bg-green-700">
                    Submit Registration
                </button>
            @endif
        </div>
    </div>
</div>