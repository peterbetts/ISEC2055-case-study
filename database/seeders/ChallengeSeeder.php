<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\ChallengeTicket;

class ChallengeSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Challenge User',
            'email' => 'challenge@example.com',
        ]);

        ChallengeTicket::create([
            'user_id' => $user->id,
            'subject' => 'VPN not working',
            'body' => 'I cannot connect to the VPN since yesterday.',
        ]);

        ChallengeTicket::create([
            'user_id' => $user->id,
            'subject' => 'Laptop overheating',
            'body' => 'My laptop gets very hot when running Zoom.',
        ]);

        $victim = User::factory()->create([
            'email' => 'victim@example.com',
        ]);

        ChallengeTicket::create([
            'id' => 3,
            'user_id' => $victim->id,
            'subject' => 'Cffee sill',
            'body' => 'I silled my cffee n my keybard and nw tw f my keys are brken.',
        ]);

        ChallengeTicket::create([
            'id' => 4,
            'user_id' => $victim->id,
            'subject' => 'HELP',
            'body' => 'MY LIFE IS BEING CONTROLLED BY FILTHY CAPITALISTS! SOMEBODY PLEASE LIBERATE THE WORKING CLASS!',
        ]);

        ChallengeTicket::create([
            'id' => 5,
            'user_id' => $victim->id,
            'subject' => 'I am tired',
            'body' => 'Let me sleep.',
        ]);

        ChallengeTicket::create([
            'id' => 6,
            'user_id' => $victim->id,
            'subject' => 'Flag?',
            'body' => 'FLAG! This is an example of both Broken Access Control and Insecure Design. Whoever came up with the ticket system never thought that anyone would try to change the URL to access other tickets. If they had used threat modeling to figure out potential security flaws during the design phase, they likely would have ended up implementing some sort of validation for accessing tickets.',
        ]);
    }
}
