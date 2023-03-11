<?php

namespace App\Http\Livewire\Frontend\Cart;

use App\Models\Cart;
use Livewire\Component;

class CartShow extends Component
{
    public $cart;
    public function incrementQuantity($cartId)
    {
        $cartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();
        if ($cartData) {
            $cartData->increment('quantity');
        }
    }

    public function decrementQuantity($cartId)
    {
        $cartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();
        if ($cartData) {
            $cartData->decrement('quantity');
            if ($cartData->quantity == 0) {
                $cartData->delete();
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Remove successfully!',
                    'type' => 'success',
                    'status' => 200
                ]);
            }
        }
    }
    public function render()
    {
        $this->cart = Cart::where('user_id', auth()->user()->id)->get();
        $totalPrice = 0;
        return view('livewire.frontend.cart.cart-show', ['cart' => $this->cart, 'totalPrice' => $totalPrice]);
    }

    public function removeCartItem(int $id)
    {
        Cart::where('user_id', auth()->user()->id)->where('id', $id)->delete();
        $this->emit('CartAddedOrUpdated');
        $this->dispatchBrowserEvent('message', [
            'text' => 'Remove successfully!',
            'type' => 'success',
            'status' => 200
        ]);
    }
}
