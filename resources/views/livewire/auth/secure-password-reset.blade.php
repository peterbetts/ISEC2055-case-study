<div class="space-y-6">
    <div>
        <h2 class="text-2xl font-bold">Reset Password (Secure)</h2>
        <p class="text-gray-600 dark:text-gray-400">Enter your new password</p>
    </div>

    @if ($error)
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            {{ $error }}
        </div>
    @elseif (session('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
            {{ session('message') }}
        </div>
    @endif

    @if ($resetRecord && !$error)
        <form wire:submit="resetPassword" class="space-y-4">
            <flux:input
                wire:model="email"
                label="Email Address"
                type="email"
                disabled
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
    @else
        <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded">
            <p>This password reset link is invalid or has expired. Please request a new one.</p>
            <a href="{{ route('login') }}" class="underline mt-2 inline-block">Back to Login</a>
        </div>
    @endif
</div>
