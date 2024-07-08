<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Dashboard;
use App\Livewire\DashProfile;
use App\Livewire\History;
use App\Livewire\Needs;
use App\Livewire\Blog;
use App\Livewire\Notifications;
use App\Livewire\DonateForm;
use App\Livewire\Admin\Dashboard as AdminDashboard;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/dashboard', AdminDashboard::class)->middleware(['auth', 'verified'])->name('admin.dashboard');
Route::get('/dashboard', Dashboard::class)->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dash-profile', DashProfile::class)->middleware(['auth', 'verified'])->name('dash-profile');
Route::get('/history', History::class)->name('history');
Route::get('/needs', Needs::class)->name('needs');
Route::get('/blog', Blog::class)->name('blog');
Route::get('/notifications', Notifications::class)->name('notifications');
Route::get('/donate-form', DonateForm::class)->name('donate-form');

Route::post('/paypal', [DonateForm::class, 'paypal'])->name('paypal');
Route::get('/paypal-success', [DonateForm::class, 'success'])->name('paypal.success');
Route::get('/paypal-cancel', [DonateForm::class, 'cancel'])->name('paypal.cancel');


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