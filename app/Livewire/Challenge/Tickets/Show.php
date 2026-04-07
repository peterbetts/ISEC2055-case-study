<?php

namespace App\Livewire\Challenge\Tickets;

use Livewire\Component;
use App\Models\ChallengeTicket;

class Show extends Component
{
    public $ticket;

    public function mount(ChallengeTicket $ticket)
    {
        // ❌ Insecure by design: no authorization check
        $this->ticket = $ticket;
    }

    public function render()
    {
        return view('challenge.tickets.show');
    }
}
