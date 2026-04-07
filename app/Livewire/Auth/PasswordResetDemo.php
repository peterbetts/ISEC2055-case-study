<?php

namespace App\Livewire\Auth;

use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Support\Str;
use Livewire\Component;

class PasswordResetDemo extends Component
{
    public array $tokens = [];

    public function mount()
    {
        // Generate demo tokens for vulnerable and secure endpoints
        $users = User::all();

        foreach ($users as $user) {
            // Create vulnerable token (expires in 30 days but check is skipped)
            $vulnerableToken = PasswordReset::create([
                'user_id' => $user->id,
                'token' => 'vulnerable-' . Str::random(40),
                'expires_at' => now()->addDays(30),
                'used' => false,
            ]);

            // Create secure token (expires in 1 hour, single use)
            $secureToken = PasswordReset::create([
                'user_id' => $user->id,
                'token' => 'secure-' . Str::random(40),
                'expires_at' => now()->addHour(),
                'used' => false,
            ]);

            $this->tokens[] = [
                'user' => $user,
                'vulnerable_token' => $vulnerableToken->token,
                'secure_token' => $secureToken->token,
                'vulnerable_url' => route('password.reset.vulnerable', ['token' => $vulnerableToken->token]),
                'secure_url' => route('password.reset.secure', ['token' => $secureToken->token]),
            ];
        }
    }

    public function render()
    {
        return view('livewire.auth.password-reset-demo');
    }
}
