<?php

namespace App\Livewire\Auth;

use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class SecurePasswordReset extends Component
{
    public string $token = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    public ?PasswordReset $resetRecord = null;
    public string $error = '';

    public function mount($token)
    {
        $this->token = $token;

        // HARDENED: Validate token exists, hasn't been used, and hasn't expired
        $this->resetRecord = PasswordReset::where('token', $token)
            ->where('used', false)
            ->where('expires_at', '>', now())
            ->first();

        if (!$this->resetRecord) {
            $this->error = 'Invalid or expired reset token.';
            return;
        }

        // HARDENED: Pre-populate email from token (user can't change it)
        $this->email = $this->resetRecord->user->email;
    }

    public function resetPassword()
    {
        // HARDENED: Verify reset record still exists
        if (!$this->resetRecord) {
            $this->error = 'Invalid reset session. Please request a new password reset.';
            return;
        }

        $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        // HARDENED: Verify token belongs to this user (prevent token misuse)
        if ($this->resetRecord->user->email !== $this->email) {
            $this->error = 'Invalid reset request.';
            return;
        }

        // HARDENED: Check token hasn't been used (prevent token reuse)
        if ($this->resetRecord->used) {
            $this->error = 'This reset token has already been used. Please request a new one.';
            return;
        }

        // HARDENED: Check token hasn't expired
        if ($this->resetRecord->isExpired()) {
            $this->error = 'This reset token has expired. Please request a new one.';
            return;
        }

        // Reset the password
        $this->resetRecord->user->update([
            'password' => Hash::make($this->password),
        ]);

        // HARDENED: Mark token as used (one-time use only)
        $this->resetRecord->update(['used' => true]);

        session()->flash('message', 'Password reset successfully! You can now log in.');
        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.auth.secure-password-reset');
    }
}
