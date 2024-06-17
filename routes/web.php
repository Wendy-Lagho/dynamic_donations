<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Livewire\Dashboard;

use App\Livewire\Admin\Dashboard as AdminDashboard;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', Dashboard::class)->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/admin/dashboard', AdminDashboard::class)->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/logout', function () {
    $guards = array_keys(config('auth.guards'));

    foreach ($guards as $guard) {
        if (auth()->guard($guard)->check()) {
            auth()->guard($guard)->logout();
        }
    }

    return redirect('/');
})->name('logout');

require __DIR__.'/auth.php';


// route::get('admin/dashboard',[HomeController::class,'index'])->
// middleware(['auth','admin']);