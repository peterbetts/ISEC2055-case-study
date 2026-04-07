<div>
    <flux:button href="{{ route('customers') }}" variant="ghost" icon="chevron-left" wire:navigate>Back to Customers</flux:button>

    <div class="w-1/2">
        <form wire:submit="update" class="space-y-6 grid gap-4 mt-4">
            <flux:input wire:model="form.first_name" label="First Name" />
            <flux:input wire:model="form.last_name" label="Last Name" />
            <flux:input wire:model="form.email" label="Email" type="email" />
            <flux:button type="submit" variant="primary">Update Customer</flux:button>
        </form>
    </div>
</div>
