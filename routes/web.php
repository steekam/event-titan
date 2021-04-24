<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\WelcomPage;
use Illuminate\Support\Facades\Route;

Route::get('/', WelcomPage::class);

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])
        ->middleware('can:manageEvent,event')
        ->name('events.edit');
    Route::get('/events/{event}/bookTicket', [EventController::class, 'bookTicket'])
        ->middleware('can:bookTicket,event')
        ->name('events.bookTicket');
});
