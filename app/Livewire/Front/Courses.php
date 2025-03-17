<?php

namespace App\Livewire\Front;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class Courses extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search ;
    public function addCart($coursId){
        if(!auth()->check()){
            return redirect(route('home'));//TODO to login page
        }
        $item = Cart::get()
            ->where('product_id','=',$coursId)
            ->where('user_id','=', auth()->id())->first();
        if($item){
            // dd($item);
            $item->delete();
        }else{
            Cart::create([
                'user_id' => auth()->id(),
                'product_id' => $coursId,
            ]);
        }
        $this->dispatch('cart-created');
    }

    public function boot(){

    }
    #[Layout('front.master')]
    public function render()
    {
        $courses = Product::query()
        ->where('name','like','%'.$this->search.'%')
        // ->orWhere('description','like','%'.$this->search.'%')
        // ->orWhere('bio','like','%'.$this->search.'%')
        ->paginate(12);
        return view('livewire.front.courses',compact(['courses']));
    }
}
