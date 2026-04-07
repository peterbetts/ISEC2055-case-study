<div>
    <flux:heading size="xl">Customers</flux:heading>

    <form wire:submit="addCustomer" class="space-y-6 grid grid-cols-3 gap-4 mt-4">
        <flux:input wire:model="form.first_name" label="First Name" />
        <flux:input wire:model="form.last_name" label="Last Name" />
        <flux:input wire:model="form.email" label="Email" type="email" />
        <flux:button type="submit" variant="primary">Add Customer</flux:button>
    </form>

    <flux:table class="mt-4">
        <flux:table.columns>
            <flux:table.column>ID</flux:table.column>
            <flux:table.column>First Name</flux:table.column>
            <flux:table.column>Last Name</flux:table.column>
            <flux:table.column>Email</flux:table.column>
            <flux:table.column>Rep</flux:table.column>
            <flux:table.column>Actions</flux:table.column>
        </flux:table.columns>

        <flux:table.rows>
            @foreach ($customers as $customer)
                <flux:table.row>
                    <flux:table.cell>
                        {{ $customer->id }}
                    </flux:table.cell>
                    <flux:table.cell>
                        {{ $customer->first_name }}
                    </flux:table.cell>
                    <flux:table.cell>
                        {{ $customer->last_name }}
                    </flux:table.cell>
                    <flux:table.cell>
                        {{ $customer->email }}
                    </flux:table.cell>
                    <flux:table.cell>
                        {{ $customer->rep->name }}
                    </flux:table.cell>
                    <flux:table.cell>
                        <flux:button href="{{ route('customers.edit', $customer) }}" wire:navigate>Edit</flux:button>
                        <flux:button class="cursor-pointer" variant="danger" wire:click="deleteCustomer({{ $customer->id }})" wire:confirm="Are you sure you want to delete this customer?">Delete</flux:button>
                    </flux:table.cell>
                </flux:table.row>
            @endforeach
        </flux:table.rows>
    </flux:table>
</div>
