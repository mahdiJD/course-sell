<?php

use App\Http\Controllers\ProfileController;
use App\Enums\Status;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Livewire\Front\CourseDetaile;
use App\Livewire\Front\Courses;
use App\Livewire\Front\Home;
use App\Livewire\Order;
use App\Livewire\ProductComponent;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');
Route::get('/courses',Courses::class)->name('courses');
Route::get('/courses_detaile/{product:slug}',CourseDetaile::class)->name('courses.detaile');
// Route::get('products',ProductComponent::class);
Route::get('/check-out',Order::class)->name('order');
Route::get('/tst',function(){
    // dd(Cart::find(1)->product()->get()->first()->name);
    dd(route('pay_api'));
});
Route::post('/invoce',[OrderController::class,'payment'])->name('invoce');
Route::post('/callback',[OrderController::class,'callBack'])->name('pay_back');
Route::get('/panel/login',function(){return redirect(route('login'));})->name('filament.panel.auth.login');



Route::get('/dashboard', function () {
    return redirect(route('filament.panel.pages.dashboard'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
