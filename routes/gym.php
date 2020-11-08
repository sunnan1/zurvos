<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('gym')->user();

    //dd($users);

    return view('gym.home');
})->name('home');

