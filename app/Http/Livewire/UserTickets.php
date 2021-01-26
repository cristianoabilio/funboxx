<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;

use Livewire\Component;


class UserTickets extends Component
{
    public function render()
    {
        return view('livewire.user-tickets', ['tickets' => Auth::user()->tickets()->get()]);
    }
}
