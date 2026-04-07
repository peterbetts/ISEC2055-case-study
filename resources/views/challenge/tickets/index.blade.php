<x-challenge.layout>
    <h1 class="text-2xl font-bold mb-4">Your Support Tickets</h1>

    @foreach ($tickets as $ticket)
        <div class="p-4 bg-neutral-900 shadow rounded mb-2">
            <a href="{{ route('challenge.tickets.show', $ticket->id) }}">
                Ticket #{{ $ticket->id }} — {{ $ticket->subject }}
            </a>
        </div>
    @endforeach
</x-challenge.layout>
