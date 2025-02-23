<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/dhcp', function () {
    return view('dhcp');
});

Route::get('/ftp', function () {
    return view('ftp');
});
