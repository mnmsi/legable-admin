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
use App\Http\Controllers\System\SubscriptionController;
use App\Http\Controllers\User\AccountSettingsController;
use App\Http\Controllers\User\BillingController;
use App\Http\Controllers\User\CardController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\InformationController;
use App\Http\Controllers\User\MailVerificationController;
use App\Http\Controllers\User\MasterKeyController;
use App\Http\Controllers\User\PhoneVerificationController;
use App\Http\Controllers\User\UserAddressController;
use App\Http\Controllers\User\UserController;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade\Pdf;

Auth::routes();

Route::middleware('auth')->group(function () {

    //Update plan
    Route::get('update/plan', [BillingController::class, 'updatePlan'])->name('update.plan');
    //Subscribe
    Route::post("subscribe", [SubscriptionController::class, 'subscribe'])->name('subscribe');

    Route::middleware('subscription')->group(function () {
        //Dashboard
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('downloadInvoice/{id}', [BillingController::class, 'downloadInvoice'])->name('download.invoice');

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
                Route::post("update/{id}", [UserAddressController::class, 'update'])->name("update");
                Route::get('active/{id}', [UserAddressController::class, 'activeAddress'])->name('active');
            });
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
            Route::post('order', [DrawerController::class, 'orderDrawer'])->name('order');

            Route::match(['get', 'post'], 'change-name/{id}', [DrawerController::class, 'changeName'])->name('change.name');
            Route::get('change-password/{id}', [DrawerController::class, 'changePassword'])->name('change.password');
            Route::get('delete/{id}', [DrawerController::class, 'delete'])->name('delete');

        });

        //box
        Route::prefix('box')->as('box.')->group(function () {
            Route::post('create', [BoxController::class, 'create'])->name('create');
        });

        //File
        Route::prefix('file')->as('file.')->group(function () {
            Route::get('upload', [FileController::class, 'upload'])->name('upload');
            Route::post('store', [FileController::class, 'store'])->name('store');
            Route::post('store-ajax', [FileController::class, 'storeAjax'])->name('store.ajax');
            Route::get('get/{id}', [FileController::class, 'getFile'])->name('get.file');
        });

        //Information
        Route::prefix('information')->as('information.')->group(function () {
            Route::get('', [InformationController::class, 'addInfo'])->name('add');
            Route::post('store', [FileController::class, 'store'])->name('store');
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

        //Billing
        Route::prefix('billing')->as('billing.')->group(function () {
            Route::get('', [BillingController::class, 'index'])->name('index');

            Route::prefix('card')->as('card.')->group(function () {
                Route::get('add', [CardController::class, 'addCard'])->name('add');
                Route::post('store', [CardController::class, 'storeCard'])->name('store');
                Route::get('active/{id}', [CardController::class, 'activeCard'])->name('active');
                Route::get('delete/{id}', [CardController::class, 'deleteCard'])->name('delete');
            });
        });

        //Mail verification
        Route::prefix('mail')->as('mail.')->group(function () {
            Route::get('verification', [MailVerificationController::class, 'showVerification'])->name('verification');
            Route::post('verify', [MailVerificationController::class, 'verifyMail'])->name('verify');
        });

        //Phone verification
        Route::prefix('phone')->as('phone.')->group(function () {
            Route::get('verification', [PhoneVerificationController::class, 'showVerification'])->name('verification');
            Route::post('verify', [PhoneVerificationController::class, 'verifyPhone'])->name('verify');
        });
    });
});


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
