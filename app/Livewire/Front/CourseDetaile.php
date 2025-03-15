<?php

namespace App\Livewire\Front;

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;

class CourseDetaile extends Component
{
    public $course;
    public function mount(Product $product){
        // $this->course = Product::get()->where('slug',$slug);
        $this->course = $product;
    }
    #[Layout('front.master')]
    public function render()
    {
        return view('livewire.front.course-detaile');
    }
}
