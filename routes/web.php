<?php

use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Content\BoxController;
use App\Http\Controllers\Content\ContentController;
use App\Http\Controllers\Content\DrawerController;
use App\Http\Controllers\Content\FileController;
use App\Http\Controllers\Content\SearchController;
use App\Http\Controllers\Content\SecurityController;
use App\Http\Controllers\Device\DeviceController;
use App\Http\Controllers\MyPlan\MyPlanController;
use App\Http\Controllers\User\AccountSettingsController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\MasterKeyController;
use App\Http\Controllers\User\UserAddressController;
use App\Http\Controllers\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::middleware('auth')->group(function () {

    Route::get('/', [DashboardController::class, 'index']);

    //User
    Route::prefix('user')->as('user.')->group(function () {
        Route::get("edit", [UserController::class, 'edit'])->name("edit");
        Route::post("update", [UserController::class, 'update'])->name("update");
        Route::post('password/change', [ResetPasswordController::class, 'passwordReset'])->name('password.change');

        //Master key
        Route::prefix('master-key')->as('master-key.')->group(function () {
            Route::post('set', [MasterKeyController::class, 'setMasterKey'])->name('set');
            Route::get('change/status', [MasterKeyController::class, 'changeStatus'])->name('change.status');
        });

        Route::prefix("address")->as("address.")->group(function () {
            Route::get("add", [UserAddressController::class, 'add'])->name("add");
            Route::post("store", [UserAddressController::class, 'store'])->name("store");
            Route::get("edit/{id}", [UserAddressController::class, 'edit'])->name("edit");
        });

//        Route::prefix("address")->as("address.")->group(function () {
//            Route::get("add", function () {
//                return view("pages.address.add");
//            })->name("add");
//            Route::get("edit/{id}", function () {
//                return view("pages.address.edit");
//            })->name("edit");
//        });
    });

    //account settings
    Route::get("account-settings", [AccountSettingsController::class, 'accountSettings'])->name('acc.setting');

    //All content
    Route::match(['get', 'post'], 'content', [ContentController::class, 'index'])->name('content');

    //drawer
    Route::prefix('drawer')->as('drawer.')->group(function () {
        Route::get('', [DrawerController::class, 'index'])->name('index');
        Route::get('add', [DrawerController::class, 'add'])->name('add');
        Route::post('create', [DrawerController::class, 'create'])->name('create');
        Route::get('items/{id}', [DrawerController::class, 'items'])->name('items');
    });

    //box
    Route::prefix('box')->as('box.')->group(function () {
        Route::post('create', [BoxController::class, 'create'])->name('create');
    });

    //File
    Route::prefix('file')->as('file.')->group(function () {
        Route::get('upload', [FileController::class, 'upload'])->name('upload');
        Route::post('store', [FileController::class, 'store'])->name('store');
        Route::get('get/{id}', [FileController::class, 'getFile'])->name('get.file');
    });

    //Security
    Route::prefix('security')->as('security.')->group(function () {
        Route::get('check', [SecurityController::class, 'check'])->name('check');
        Route::get("settings", [SecurityController::class, 'settings'])->name('settings');
    });

    //device
    Route::prefix('device')->as('device.')->group(function () {
        Route::get("/", [DeviceController::class, 'devices'])->name('list');
        Route::get("remove/{id}", [DeviceController::class, 'remove'])->name('remove');
    });

    //My plans
    Route::prefix('my-plans')->as('myPlan.')->group(function () {
        Route::get("/", [MyPlanController::class, 'myPlan'])->name('my-plan');
        Route::get('auto-renewal', [MyPlanController::class, 'autoRenewal'])->name('auto.renewal');
    });

    //Search
    Route::get("search", [SearchController::class, 'search'])->name('search');
});


//search
Route::get("/search-empty", function () {
    return view("pages.dashboard.empty");
});

//billing info
Route::get("/billing", function () {
    return view("");
});

Route::prefix("/billing")->as("billing.")->group(function () {
    Route::get("/", function () {
        return view("pages.billing.index");
    });
    Route::get("/add", function () {
        return view("pages.billing.add");
    })->name("add");
});

//Route::get('/drawer/upload', function () {
//    return view("pages.allContent.upload");
//});

// important


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
        'my_en'      => myencrypt('saiful islam'),
        'my_de'      => mydecrypt('MHNkNFNra2lVbkhxQlhNMEJxNHovUT09'),
    ];
});

Route::get("email_verify", function () {
    return view("auth.verify_email");
});

Route::get("phone_verify", function () {
    return view("auth.verify_phone");
});


/**
 * Define route for design purpose
 */

//Address

Route::prefix("address")->as("address.")->group(function () {
    Route::get("add", function () {
        return view("pages.address.add");
    })->name("add");
    Route::get("edit/{id}", function () {
        return view("pages.address.edit");
    })->name("edit");
});


//edit personal info
Route::get("account-edit/{id}",function (){
    return view('pages.account.edit');
})->name("account.edit");


//add information

Route::get("/information",function (){
    return view("pages.information.add");
});
