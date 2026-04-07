<?php

namespace App\Livewire\Auth;

use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class VulnerablePasswordReset extends Component
{
    public string $token = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    public ?PasswordReset $resetRecord = null;

    public function mount($token)
    {
        $this->token = $token;
        // VULNERABILITY: No token validation here
        $this->resetRecord = PasswordReset::where('token', $token)->first();
    }

    public function resetPassword()
    {
        $this->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::where('email', $this->email)->firstOrFail();

        // VULNERABILITY #1: No check if token belongs to this user
        // An attacker could use any valid token to reset ANY user's password

        // VULNERABILITY #2: No check if token has been used
        // Token can be reused multiple times

        // VULNERABILITY #3: No expiration check
        // Old tokens never expire if not checked

        $user->update([
            'password' => Hash::make($this->password),
        ]);

        session()->flash('message', 'Password reset successfully!');
        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.auth.vulnerable-password-reset');
    }
}
