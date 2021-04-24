<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ShowEvent;
use App\Http\Livewire\EventManagement;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])
        ->middleware('can:manageEvent,event')
        ->name('events.edit');
});

