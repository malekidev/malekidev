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
Route::get('/login', [AuthController::class,'loginShow'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class,'login'])->name('login.post');
Route::get('/logout', [AuthController::class,'logout'])->name('logout');
Route::get('/register', [AuthController::class,'registerShow'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class,'register'])->name('register.post');
Route::get('/verify-phone', [AuthController::class,'verifyShow'])->name('verify-phone.show')->middleware('auth');
Route::post('/verify-phone', [AuthController::class,'verify'])->name('verify-phone.post');
Route::post('/send-verify-code', [AuthController::class,'sendVerify'])->name('verify-phone.send');

Route::get('/test', function (){
//     \App\Models\User::find(1)->refreshPermissions('add-user');
    dd(\App\Models\User::find(1)->can('add'));

});
