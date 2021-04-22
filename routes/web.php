<?php

use App\Http\Livewire\EventManagement;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    Route::get('/events', EventManagement::class)->name('events');
});

