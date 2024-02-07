<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

;// Mails imported
use \App\Mail\OrderShippedMail;

// importing my notifications here.
use App\Http\Controllers\TestsEnrollmentController;

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

Route::get('/send-email', function () {
    Mail::send(new OrderShippedMail());
    return null;
});

Route::get('/send-testenrollment', [TestsEnrollmentController::class, 'sendTestNotification']);

Route::get('/comments', function (\Illuminate\Http\Request $request) {
    // a token is being generated for every session
    $token = $request->session()->token();

    $token2 = csrf_token();

    return [
        $token,$token2
    ];
});
