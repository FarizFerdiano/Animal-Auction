<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', function () {
    return view('pages.page.login');
});
Route::get('/register', function () {
    return view('pages.page.register');
});
Route::get('/home', function () {
    return view('pages.page.home');
});
Route::get('/auctions', function () {
    return view('pages.page.auctions');
});
Route::get('/detail', function () {
    return view('pages.page.detail');
});
Route::get('/mybid', function () {
    return view('pages.page.mybid');
});
Route::get('/noneauction', function () {
    return view('pages.page.noneauction');
});

