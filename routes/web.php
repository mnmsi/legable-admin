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
    return view("pages.secretDrawer.index");
});
Route::get('/drawer/add', function () {
    return view("pages.secretDrawer.add");
});

Route::get('/content', function () {
    return view("pages.allContent.index");
});

Route::get('/drawer/upload', function () {
    return view("pages.allContent.upload");
});

// important

Route::get('/drawer/item', function () {
    return view("pages.secretDrawer.singleDrawer");
});

//Auth::routes();
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
