<?php

namespace App\Livewire;

use Livewire\Component;

class MisCompras extends Component
{
    public function render()
    {
        $invoices = auth()->user()->invoices();
        return view('livewire.mis-compras', compact('invoices'));
    }
}
