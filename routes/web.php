<?php

use App\Mail\MailForgotPassword;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guest\ViewClientController;
use App\Http\Controllers\Auth\AuthClientController;
use App\Http\Controllers\CronJobs\Service\CreateOrderController;
use App\Http\Controllers\Guest\DataClientController;
use App\Http\Controllers\Guest\Service\ViewServiceController;
use App\Mail\ForgotPassword;
use Illuminate\Support\Facades\Artisan;
 

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

/* Route::get('/', function () {
    return view('home');
}); */

/* Route::get('/callsql', function(){
    return Artisan::call('migrate');
}); */

Route::prefix('/install')->middleware(['install'])->group(function () {
    Route::get('/website', [AuthClientController::class, 'InstallPage'])->name('install.website');
    Route::post('/website', [AuthClientController::class, 'Install'])->name('install.website.post');
});

Route::get('/logout', [AuthClientController::class, 'Logout'])->name('logout');
Route::prefix('/auth')->middleware('guest')->group(function () {
    Route::get('/login', [AuthClientController::class, 'LoginPage'])->name('login');
    Route::post('/login', [AuthClientController::class, 'Login'])->name('login.post');
    Route::get('/register', [AuthClientController::class, 'RegisterPage'])->name('register');
    Route::post('/register', [AuthClientController::class, 'Register'])->name('register.post');
    Route::get('/forgot-password', [AuthClientController::class, 'ForgotPasswordPage'])->name('forgot.password');
    Route::post('/forgot-password', [AuthClientController::class, 'ForgotPassword'])->name('forgot.password.post');
    Route::get('/reset-password/{token}', [AuthClientController::class, 'ResetPasswordPage'])->name('reset.password');
    Route::post('/reset-password/{token}', [AuthClientController::class, 'ResetPassword'])->name('reset.password.post');
 
    //login google
    Route::get('/login/google', [AuthClientController::class, 'LoginGoogle'])->name('login.google');
    Route::get('/login/google/callback', [AuthClientController::class, 'LoginGoogleCallback'])->name('login.google.callback');
});
Route::get('/', [ViewClientController::class, 'LandingPage'])->name('landing');
Route::get('/api', [ViewClientController::class, 'api'])->name('api');
Route::prefix('/')->middleware('auth')->group(function () {
    Route::get('/home', [ViewClientController::class, 'HomePage'])->name('home');
    Route::get('/profile', [ViewClientController::class, 'ProfilePage'])->name('profile');
    
    Route::post('/update-profile/{type}', [DataClientController::class, 'UpdateProfile'])->name('update-profile');

    Route::prefix('/recharge')->group(function () {
        Route::get('/transfer', [ViewClientController::class, 'TransferPage'])->name('recharge.transfer');
        Route::get('/card', [ViewClientController::class, 'CardPage'])->name('recharge.card');
        Route::post('/card', [DataClientController::class, 'Card'])->name('recharge.card.post');
    });

    Route::get('/user/history', [ViewClientController::class, 'HistoryPage'])->name('user.history');
    Route::get('/user/level', [ViewClientController::class, 'LevelPage'])->name('user.level');
    Route::get('/tientrinh', [ViewClientController::class, 'TientrinhPage'])->name('user.tientrinh');
    /* tool */
    Route::get('/tool/get-uid', [ViewClientController::class, 'ToolUid'])->name('tool.uid');
    Route::get('/tools/whios-domain', [ViewClientController::class, 'ToolDomain'])->name('tool.domain');
    Route::get('/toolss/2fa', [ViewClientController::class, 'Tool2fa'])->name('tool.2fa');
    /* Service */
    Route::get('/service/price', [ViewServiceController::class, 'viewService'])->name('service.price');
    Route::get('/service/{social}/{service}', [ViewServiceController::class, 'ViewServicePage'])->name('service.view');
    Route::get('/service/{chuyenmuc}', [ViewClientController::class, 'ViewChuyenmucPage'])->name('chuyenmuc.view');
    Route::get('/create-website', [ViewClientController::class, 'CreateWebsite'])->name('create.website');
    Route::get('/create-support', [ViewClientController::class, 'CreateSupport'])->name('create.support');

    Route::post('/user/list/{action}', [DataClientController::class, 'ListAction'])->name('user.list.action');
    Route::post('/user/order/{social}/{action}', [DataClientController::class, 'OrderAction'])->name('user.order.action');
    Route::post('/user/{action}', [DataClientController::class, 'UserAction'])->name('user.action');
    Route::post('/service/get/order', [DataClientController::class, 'ServiceGetOrder'])->name('service.get.order');
    Route::post('/service/get/token', [DataClientController::class, 'ServiceGetToken'])->name('service.get.token');
    Route::post('/create-website', [DataClientController::class, 'CreateWebsite'])->name('create.website.post');
    Route::post('/create-support', [DataClientController::class, 'CreateSupport'])->name('create.support.post');
    /* tool */
    Route::post('/tool/{action}', [DataClientController::class, 'ToolGetUid'])->name('tool.uid.post');
    Route::post('/toolss/{action}', [DataClientController::class, 'getAuthenTwo'])->name('tool.2fa.post');
    Route::post('/tools/{action}', [DataClientController::class, 'ToolWhiosDomain'])->name('tool.domain.post');
});

/* Route::get('/m', function(){
    return new MailForgotPassword('https://google.com');
}); */

 
 
