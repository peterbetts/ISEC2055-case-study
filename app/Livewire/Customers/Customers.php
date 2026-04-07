<?php

namespace App\Livewire\Customers;

use App\Livewire\Forms\CustomerForm;
use App\Models\Customer;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class Customers extends Component
{
    public CustomerForm $form;

    public function addCustomer()
    {
        $this->form->store();

        return redirect()->to('/customers');
    }

    public function deleteCustomer(int $id)
    {
        // Gate::authorize('delete customers', Customer::class);

        Customer::findOrFail($id)->delete();
    }

    public function render()
    {
        Gate::authorize('viewAny', Customer::class);

        $customers = Customer::latest()->paginate(10);
        return view('livewire.customers.customers', compact('customers'));
    }
}
