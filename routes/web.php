<?php
use App\Models\Event;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
Route::get('/', function () {
    return view('welcome');
});
// Route::get('events', function () {
//    $events= Event::with('organizer', 'bookings.event')->get();
//    return view('events', compact('events'));
// });
Route::get('events', [EventController::class, 'index']);
Route::get('events/{id}',[EventController::class, 'show']);


//this is used to generate all the resource routes for EventController
// Route::resources('events', EventController::class);