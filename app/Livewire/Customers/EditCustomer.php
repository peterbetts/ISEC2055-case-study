<?php

namespace App\Livewire\Customers;

use App\Livewire\Forms\CustomerForm;
use App\Models\Customer;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class EditCustomer extends Component
{
    public CustomerForm $form;

    public Customer $customer;

    public function mount(Customer $customer)
    {
        $this->customer = $customer;
        $this->form->setCustomer($customer);
    }

    public function update()
    {
        $this->form->update($this->customer);

        return redirect()->to('/customers');
    }

    public function render()
    {
        // if (Gate::denies('update-customer', $this->customer)) {
        //     abort(403);
        // }

        // uses the policy
        Gate::authorize('update', $this->customer);

        $customer = $this->customer;
        return view('livewire.customers.edit-customer', compact('customer'));
    }
}
