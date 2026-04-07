<?php

namespace App\Livewire\Challenge\Tickets;

use Livewire\Component;
use App\Models\ChallengeTicket;

class Index extends Component
{
    public $tickets;

    public function mount()
    {
        $this->tickets = ChallengeTicket::where('user_id', auth()->id())->get();
    }

    public function render()
    {
        return view('challenge.tickets.index');
    }
}
