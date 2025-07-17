<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Login extends Component
{
    public $email = '';
    public $password = '';
    public $remember = false;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|string',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function login()
    {
        $this->validate();

        // Log the login attempt for debugging
        Log::info('Login attempt for email: ' . $this->email);

        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (Auth::attempt($credentials, $this->remember)) {
            session()->regenerate();
            Log::info('Login successful for email: ' . $this->email);
            
            session()->flash('success', 'Login successful!');
            return $this->redirectRoute('products.index', navigate: true);
        }

        Log::warning('Login failed for email: ' . $this->email);

        $this->addError('email', 'The provided credentials do not match our records. Please check your email and password.');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
} 