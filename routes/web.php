<?php

use App\Http\Livewire\Changephoto;
use App\Http\Livewire\Container;
use App\Http\Livewire\Counter;
use App\Http\Livewire\Form\CreateCategory;
use App\Http\Livewire\Form\CreateLocation;
use App\Http\Livewire\Form\CreateOffer;
use App\Http\Livewire\Form\Createsubmission;
use App\Http\Livewire\Form\CreateUom;
use App\Http\Livewire\Form\Login;
use App\Http\Livewire\Form\Register;
use App\Http\Livewire\Home;
use App\Http\Livewire\Logout;
use App\Http\Livewire\Myproduct\Indexproduct;
use App\Http\Livewire\Myshowproduct;
use App\Http\Livewire\Product;
use App\Http\Livewire\Product\Create;
use App\Http\Livewire\Profil;
use App\Http\Livewire\Sidebar;
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
Route::get('/register', Register::class)->middleware('guest')->name('register');
Route::get('/home', Home::class)->name('home');
Route::get('/login', Login::class)->middleware('guest')->name('login');
Route::get('/product', Product::class)->name('product');
Route::get('/product/create', Create::class)->middleware('auth')->name('productCreate');
Route::get('/logout', Logout::class)->middleware('auth')->name('logout');
Route::get('/createCategory', CreateCategory::class)->middleware('auth')->name('createCategory');
Route::get('/createOffer/{submission_id}', CreateOffer::class)->middleware('auth')->name('createOffer');
Route::get('/createLocation', CreateLocation::class)->middleware('auth')->name('createLocation');
Route::get('/myproduct', Indexproduct::class)->middleware('auth')->name('myproduct');
Route::get('/createsubmission', Createsubmission::class)->middleware('auth')->name('createsubmission');
Route::get('/myshowproduct/{submission_id}', Myshowproduct::class)->middleware('auth')->name('myshowproduct');
Route::get('/profile', Profil::class)->middleware('auth')->name('profile');
Route::get('/changephoto', Changephoto::class)->middleware('auth')->name('changephoto');
