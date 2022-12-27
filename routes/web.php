<?php

use App\Http\Livewire\Counter;
use App\Http\Livewire\Form\Login;
use App\Http\Livewire\Form\Register;
use App\Http\Livewire\Home;
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
    return view('index');
});

Route::get('/counter', Counter::class);
Route::get('/register', Register::class)->name('register');
Route::get('/home', Home::class)->name('home');
Route::get('/login', Login::class)->name('login');
