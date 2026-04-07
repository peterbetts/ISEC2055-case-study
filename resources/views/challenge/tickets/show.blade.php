<x-challenge.layout>
    <h1 class="text-2xl font-bold mb-4">Ticket #{{ $ticket->id }}</h1>

    <div class="p-4 bg-neutral-900 shadow rounded">
        <h2 class="font-semibold">{{ $ticket->subject }}</h2>
        <p class="mt-2 whitespace-pre-line">{{ $ticket->body }}</p>
    </div>

    <a href="{{ route('challenge.tickets.index') }}" class="mt-4 inline-block">
        ← Back to Tickets
    </a>
</x-challenge.layout>
