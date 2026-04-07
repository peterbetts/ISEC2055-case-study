<div class="space-y-6">
    <div>
        <h2 class="text-2xl font-bold">Reset Password</h2>
        <p class="text-gray-600 dark:text-gray-400">Enter your email and new password</p>
    </div>

    @if (session('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit="resetPassword" class="space-y-4">
        <flux:input
            wire:model="email"
            label="Email Address"
            type="email"
            required
        />

        <flux:input
            wire:model="password"
            label="New Password"
            type="password"
            required
        />

        <flux:input
            wire:model="password_confirmation"
            label="Confirm Password"
            type="password"
            required
        />

        <flux:button type="submit" variant="primary">Reset Password</flux:button>
    </form>
</div>
