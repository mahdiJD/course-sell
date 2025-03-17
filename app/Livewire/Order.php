<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\Discount;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Order extends Component
{
    public $price_bifore ;
    public $price_after ;
    public $discount ;
    public bool $myAlert = false;
    public function closeAlert(): void  {
        $this->myAlert = false;
    }
    public function mount() : void {
        $cart = Cart::where('user_id',auth()->id())->get();
        foreach($cart as $item){
            $this->price_bifore += $item->getProduct()->price;
            // dd($item);
        }
        $this->price_after = $this->price_bifore;
    }
    public function calculate() : void {
        $result = Discount::where('code',$this->discount)->get()->first();
        if($result && $result->status ){
            $this->price_after = $this->price_bifore - $this->price_bifore * $result->discount / 100;
        }else{
            $this->price_after = $this->price_bifore ;
            $this->myAlert = true;
        }
    }
    #[Layout('front.master')]
    public function render()
    {
        return view('livewire.order');
    }
}
