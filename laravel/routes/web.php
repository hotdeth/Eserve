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
Route::get('/http', function () {
    return view('http');
});
Route::get('/dns', function () {
    return view('dns');
});
