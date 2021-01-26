<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\UserPayment;
use Illuminate\Support\Facades\Auth;

class UserPayments extends Component
{
    public function render()
    {
        $payments = UserPayment::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->limit(3)->get();    
        return view('livewire.user-payments', ['payments' => $payments]);
    }
}
