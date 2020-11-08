<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('influence')->user();

    //dd($users);

    return view('influence.home');
})->name('home');

