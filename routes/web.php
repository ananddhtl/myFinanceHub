<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/otpcode', function () {
    return view('frontend.otp');
});
Route::get('/userdashboard', function () {
    return view('frontend.userprofile.dashboard');
});
Route::get('/userprofile', function () {
    return view('frontend.userprofile.profile');
});
Route::get('/updateprofile', function () {
    return view('frontend.userprofile.updateprofile');
});
Route::get('/userdocuments', function () {
    return view('frontend.userprofile.userdocuments');
});
Route::get('/admindashboard', function () {
    return view('frontend.adminprofile.dashboard');
});
Route::get('/listusers', function () {
    return view('frontend.adminprofile.listusers');
});
// Route::get('/listusersdocuments', function () {
//     return view('frontend.adminprofile.listuserdocuments');
// });
Route::get('/adminlogin', function () {
    return view('frontend.adminprofile.loginpage');
});


Route::get('/logout-user', function () {
    session()->forget('sessionUserId');
    return redirect('/');
});

Route::post('/registerUser', [ClientController::class, 'store']);
Route::post('/addOTPCode', [ClientController::class, 'verfiyUserOTP']);
Route::post('/user-login', [ClientController::class, 'login']);


Route::get('/login/google', [ClientController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/login/google/callback', [ClientController::class, 'handleGoogleCallback']);

Route::post('/storeDocuments', [DocumentController::class, 'store']);
Route::get('/listuserdocuments', [DocumentController::class, 'index']);
Route::get('/download/{id}', [DocumentController::class, 'download']);

// Route::get('/listusersdocuments', [AdminController::class, 'listClientDocuments']);
Route::get('/listusers', [AdminController::class, 'listUser']);

Route::post('/updateBasicInformation/{id}', [ClientController::class, 'updateBasicInformation']);
Route::post('/changeUserDashboardPassword/{id}', [ClientController::class, 'updateUserpassword']);