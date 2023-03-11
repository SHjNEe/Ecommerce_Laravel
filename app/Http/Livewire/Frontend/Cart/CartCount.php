<?php

namespace App\Http\Livewire\Frontend\Cart;

use App\Models\Cart;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CartCount extends Component
{

    public $cartCount;
    //wishlistAddedOrUpdated
    protected $listeners = ['CartAddedOrUpdated' => 'checkCartCountCheck'];

    public function checkCartCountCheck()
    {
        if (Auth::check()) {
            return $this->cartCount = Cart::where('user_id', auth()->user()->id)->count();
        } else {
            $this->cartCount = 0;
        }
    }

    public function render()
    {
        $this->cartCount = $this->checkCartCountCheck();
        return view('livewire.frontend.cart.cart-count', ['cartCount' => $this->cartCount]);
    }
}
