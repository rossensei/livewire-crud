<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\PostComponent;
use App\Http\Livewire\CreateComponent;
use App\Http\Livewire\EditComponent;
use App\Http\Livewire\ConfirmationComponent;

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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', PostComponent::class)->name('posts');
Route::get('/confirmation', ConfirmationComponent::class)->name('confirmation');
Route::get('/create-post', CreateComponent::class)->name('create-post');
Route::get('/edit-post/{id}', EditComponent::class)->name('edit-post');
