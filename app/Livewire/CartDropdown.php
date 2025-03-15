<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cart; // فرض بر اینکه مدل سبد خرید دارید
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;

class CartDropdown extends Component
{
    public $cartItems;
    public $isOpen = false;

    // protected $listeners = ['cartUpdated' => 'loadCart'];

    public function mount()
    {
        // $this->loadCart();
    }

    public function loadCart()
    {
        $this->cartItems = Cart::get()->where('user_id',auth()->id());
    }

    public function toggleDropdown()
    {
        $this->isOpen = !$this->isOpen;
    }

    #[Layout('front.master')]
    public function render()
    {
        return view('livewire.cart-dropdown');
    }
}
