<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Navbar extends Component
{
    public string $routeName = 'welcome';

    public array $items = [
        'login' => 'Login',
        'signup' => 'Sign up',
    ];

    public function render()
    {
        return view('livewire.navbar');
    }
}
