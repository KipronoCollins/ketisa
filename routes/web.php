<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/history', function () {
    return view('history');
});

Route::get('/management', function () {
    return view('management');
});

Route::get('/gallery', function () {
    return view('gallery');
});