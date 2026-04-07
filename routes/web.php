<?php

use App\Livewire\Auth\PasswordResetDemo;
use App\Livewire\Auth\SecurePasswordReset;
use App\Livewire\Auth\VulnerablePasswordReset;
use App\Livewire\Customers\Customers;
use App\Livewire\Customers\CustomersSecure;
use App\Livewire\Customers\EditCustomer;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');

    // Route::livewire('/customers', Customers::class)->middleware(['role:admin'])->name('customers');
    Route::livewire('/customers', Customers::class)->name('customers');
    Route::livewire('/customers-secure', CustomersSecure::class)->name('customers.secure');
    Route::livewire('/customers/{customer}/edit', EditCustomer::class)->name('customers.edit');

    Route::livewire('/password-reset-demo', PasswordResetDemo::class)->name('password.reset.demo');
    Route::get('/password-reset/{token}', VulnerablePasswordReset::class)->name('password.reset.vulnerable');
    Route::get('/password-reset-secure/{token}', SecurePasswordReset::class)->name('password.reset.secure');
});

require __DIR__.'/challenge.php';

require __DIR__ . '/settings.php';
