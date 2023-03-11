<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Wishlist;

class WishlistShow extends Component
{
    public function render()
    {
        $wishlist = Wishlist::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.wishlist-show', [
            'wishlist' => $wishlist
        ]);
    }

    public function removeWishListItem(int $id)
    {
        Wishlist::where('user_id', auth()->user()->id)->where('id', $id)->delete();
        $this->emit('wishlistAddedOrUpdated');
        $this->dispatchBrowserEvent('message', [
            'text' => 'Remove successfully!',
            'type' => 'success',
            'status' => 200
        ]);
    }
}
