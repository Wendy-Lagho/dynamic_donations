<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Dashboard;
use App\Livewire\DashProfile;
use App\Livewire\History;
use App\Livewire\Admin\Dashboard as AdminDashboard;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', Dashboard::class)->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/admin/dashboard', AdminDashboard::class)->name('admin.dashboard');
Route::get('/dash-profile', DashProfile::class)->name('dash-profile');
Route::get('/history', History::class)->name('history');


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