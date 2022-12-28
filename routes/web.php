<?php

use App\Http\Livewire\Container;
use App\Http\Livewire\Counter;
use App\Http\Livewire\Form\Login;
use App\Http\Livewire\Form\Register;
use App\Http\Livewire\Home;
use App\Http\Livewire\Logout;
use App\Http\Livewire\Product;
use App\Http\Livewire\Product\Create;
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


Route::get('/', Home::class)->name('home');
Route::get('/counter', Counter::class);
Route::get('/register', Register::class)->name('register');
Route::get('/home', Home::class)->name('home');
Route::get('/login', Login::class)->name('login');
Route::get('/product', Product::class)->name('product');
Route::get('/product/create', Create::class)->name('productCreate');
Route::get('/logout', Logout::class)->name('logout');
