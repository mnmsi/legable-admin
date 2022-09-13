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

Route::get('/', function () {
//    return view('welcome');
    return view("dashboard.index");
});

//drawer
Route::get('/drawer', function () {
//    return view('welcome');
    return view("pages.secretDrawer.index");
});
Route::get('/drawer/add', function () {
//    return view('welcome');
    return view("pages.secretDrawer.add");
});

//Auth::routes();
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
