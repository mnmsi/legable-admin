<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    return view("pages.dashboard.index");
});
//search
Route::get("/search-empty", function () {
    return view("pages.dashboard.empty");
});
//device
Route::get("/device", function () {
    return view("pages.device.index");
});
//account
Route::get("/account-settings", function () {
    return view("pages.account.index");
});
//security
Route::get("/security-settings", function () {
    return view("pages.security.index");
});

//drawer
Route::get('/drawer', function () {
    return view("pages.secretDrawer.index");
});
Route::get('/drawer/add', function () {
    return view("pages.secretDrawer.add");
});
//my plans
Route::get("/my-plans", function () {
    return view("pages.plans.index");
});
//billing info
Route::get("/billing", function () {
    return view("pages.billing.index");
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


Route::get('test', function (Request $request) {

    $crypt   = \Illuminate\Support\Facades\Crypt::encrypt("saiful Islam");
    $encrypt = encrypt("saiful islam");

//    $output = false;
//    $encrypt_method = "AES-256-CBC";
//    $secret_key = 'xxxxxxxxxxxxxxxxxxxxxxxx';
//    $secret_iv = 'xxxxxxxxxxxxxxxxxxxxxxxxx';
//    // hash
//    $key = hash('sha256', $secret_key);
//    // iv - encrypt method AES-256-CBC expects 16 bytes
//    $iv = substr(hash('sha256', $secret_iv), 0, 16);
//    if ( $request->action == 'encrypt' ) {
//        $output = openssl_encrypt($request->string, $encrypt_method, $key, 0, $iv);
//        $output = base64_encode($output);
//    } else if( $request->action == 'decrypt' ) {
//        $output = openssl_decrypt(base64_decode($request->string), $encrypt_method, $key, 0, $iv);
//    }
//
//    return $output;

    return [
        'crypt'      => $crypt,
        'encrypt'    => $encrypt,
        'crypt_en'   => \Illuminate\Support\Facades\Crypt::decrypt($encrypt),
        'decrypt_en' => decrypt($crypt),
        'hash_hmac'  => hash_hmac('sha256', base64_encode('Saiful'), 'iotait.tech'),
        'my_en'      => myencrypt("iotait", "saiful", 'saiful islam'),
        'my_de'      => mydecrypt("iotait", "saiful", 'ZXF3VS9KUGJYWTErTnVydndJY3JNZz09'),
    ];
});
