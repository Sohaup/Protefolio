<?php

use App\Http\Controllers\avatar_controller;
use App\Http\Controllers\Comment_Controller;
use App\Http\Controllers\Post_Controller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Replay_Comments_Controller;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;



Route::get('/', function () {
    $user = true;
    if (Auth::check()) {
        $user = Auth::user();
    } else {
        $user = false;
    }
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        'user'=>$user
    ]);
});

Route::get('/dashboard', function () {
    $id = Auth::id();
    $user = User::find($id);
    if ($user->avatar) {
    $avatar = $user->avatar;
    return Inertia::render('Dashboard',['avatar'=>$avatar]);
    }  else {
        return Inertia::render('Dashboard');
    }
    
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource("avatar", avatar_controller::class)->names([
    'store'=>'avatar_create',
    'edit'=>'avatar_edit',
    'update'=>'avatar_update',
    'delete'=>'avatar_delete',
    'create'=>'avatar_main'
]);

Route::resource("postspath",Post_Controller::class);
Route::resource('comments',Comment_Controller::class);
Route::resource('replaycomments',Replay_Comments_Controller::class);

require __DIR__.'/auth.php';
