<?php

use App\Http\Controllers\ExampleController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    'login'    => true,
    'logout'   => true,
    'register' => true,
    'reset'    => true,   // for resetting passwords
    'confirm'  => false,  // for additional password confirmations
    'verify'   => false,  // for email verification
]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'example', 'as' => 'example.'], function () {
    Route::get('/', [ExampleController::class, 'index'])->name('index');
    Route::get('/create', [ExampleController::class, 'create'])->name('create');
    Route::post('store', [ExampleController::class, 'store'])->name('store');
    Route::get('/{example}/show', [ExampleController::class, 'show'])->name('show');
    Route::get('/{example}/edit', [ExampleController::class, 'edit'])->name('edit');
    Route::put('/{example}/update', [ExampleController::class, 'update'])->name('update');
    Route::delete('/{example}/destroy', [ExampleController::class, 'destroy'])->name('destroy');
});