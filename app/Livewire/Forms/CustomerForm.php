<?php

namespace App\Livewire\Forms;

use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CustomerForm extends Form
{
    #[Validate('required')]
    public string $first_name = '';

    #[Validate('required')]
    public string $last_name = '';

    #[Validate('required|email')]
    public string $email = '';

    public function setCustomer(Customer $customer)
    {
        $this->first_name = $customer->first_name;
        $this->last_name = $customer->last_name;
        $this->email = $customer->email;
    }

    public function store()
    {
        $this->validate();

        $customer = Customer::create($this->only('first_name', 'last_name', 'email'));
        $customer->rep()->associate(Auth::user());
        $customer->save();
    }

    public function update(Customer $customer)
    {
        $this->validate();

        $customer->update($this->only('first_name', 'last_name', 'email'));
    }
}
