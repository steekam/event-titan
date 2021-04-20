<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Events;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::view('/dashboard', 'dashboard');

    Route::get('/events', Events\Show::class)->name('events');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
