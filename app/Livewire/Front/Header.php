<?php

namespace App\Livewire\Front;

use App\Models\Cart;
use Livewire\Attributes\On;
use Livewire\Component;

class Header extends Component
{
    // public $cart = null;
    // public function loadCart(){
    //     $this->cart ?
    //         $this->cart = null :
    //         $this->cart = Cart::get()->where('user_id',auth()->id());
    // }
    public $cartItems = [];
    public $isOpen = false;

    public function mount(){
        $this->loadCart();
    }

    #[On('cart-created')]
    public function loadCart()
    {
        $this->cartItems = Cart::get()->where('user_id',auth()->id());
    }
    public function toggleDropdown()
    {
        $this->isOpen = !$this->isOpen;
    }
    public function render()
    {
        return view('livewire.front.header');
    }
}
