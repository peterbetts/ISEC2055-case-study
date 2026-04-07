<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Challenge\Tickets\Index;
use App\Livewire\Challenge\Tickets\Show;

Route::middleware(['auth'])
    ->prefix('challenge')
    ->group(function () {
        Route::get('/', fn() => redirect()->route('challenge.tickets.index'));

        Route::get('/tickets', Index::class)
            ->name('challenge.tickets.index');

        Route::get('/tickets/{ticket}', Show::class)
            ->name('challenge.tickets.show');
    });
