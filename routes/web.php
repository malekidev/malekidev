<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

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
Route::get('/login', [TestController::class,'test'])->name('login');
Route::get('/register', [AuthController::class,'registerShow'])->name('register');
Route::get('/verify-phone', [AuthController::class,'verifyShow'])->name('verify-phone.show');
Route::post('/register', [AuthController::class,'register'])->name('register.post');
Route::get('/test', function (){
    \App\Models\User::find(1)->notify(new \App\Notifications\UserRegisteredNotification());
});
