<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Homepage
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    return redirect('/books');

});

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {

    if (Auth::check() && Auth::user()->role == 'admin') {

        return view('admin.dashboard');

    }

    return view('client.dashboard');

})->middleware(['auth'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Marketplace Buku
    |--------------------------------------------------------------------------
    */

    Route::resource('books', BookController::class);

    /*
    |--------------------------------------------------------------------------
    | Buku Saya
    |--------------------------------------------------------------------------
    */

    Route::get('/my-books', [BookController::class, 'myBooks'])
        ->name('books.my');

    /*
    |--------------------------------------------------------------------------
    | Checkout Buku
    |--------------------------------------------------------------------------
    */

    Route::get('/books/{book}/checkout', [BookController::class, 'checkout'])
        ->name('books.checkout');

    Route::post('/books/{book}/checkout', [BookController::class, 'processCheckout'])
        ->name('books.processCheckout');

    /*
    |--------------------------------------------------------------------------
    | Beli Buku
    |--------------------------------------------------------------------------
    */

    Route::post('/books/{book}/buy', [BookController::class, 'buy'])
        ->name('books.buy');

    /*
    |--------------------------------------------------------------------------
    | Admin Client Management
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/users', [UserController::class, 'index'])
        ->name('admin.users');

    Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])
        ->name('admin.users.destroy');

    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    */

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});

/*
|--------------------------------------------------------------------------
| Laravel Breeze Auth
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';