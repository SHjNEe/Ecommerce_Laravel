<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Wishlist;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class View extends Component
{
    public $product;
    public $category;
    public $productColorSelectedQuantity;
    public function mount($category, $product)
    {
        $this->product = $product;
        $this->category = $category;
    }
    public function selectedColor($color)
    {
        $productColor = $this->product->productColors()->where('id', $color)->first();
        $this->productColorSelectedQuantity = $productColor->quantity;
        if ($this->productColorSelectedQuantity == 0) {
            $this->productColorSelectedQuantity = 'outOfStock';
        }
    }

    public function addToWishlist($productId)
    {
        if (Auth::check()) {
            if (Wishlist::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'This item is existed in wishlist!',
                    'type' => 'warning',
                    'status' => 409
                ]);
                return false;
            } else {
                $wishlist = Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId

                ]);
                // session()->flash('status', 'This item was  added to wishlist!');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'This item was  added to wishlist!',
                    'type' => 'success',
                    'status' => 200
                ]);
            }
        } else {
            // session()->flash('status', 'Please log in to continue !');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please log in to continue !',
                'type' => 'info',
                'status' => 401
            ]);
            return false;
        }
    }

    public function render()
    {
        return view('livewire.frontend.product.view', ['products' => $this->product, 'category' => $this->category]);
    }
}
