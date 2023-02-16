<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Button extends Component
{
    public string $href;

    public string $className;

    public string $content;

    public function render()
    {
        return view('livewire.button');
    }
}
