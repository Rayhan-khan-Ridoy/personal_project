<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\userController;

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
    return view('common/login');
});

Route::get('/registration', [RegistrationController::class, 'register']);
Route::post('/registration_process',[RegistrationController::class,'registration_process'])->name('registration_process');
Route::post('/login_process',[RegistrationController::class,'login_process'])->name('login_process');

Route::group(['middleware'=>'user_auth'],function() {
    Route::get('user/dashboard', [userController::class, 'index'])->name('user.dashboard');
});

Route::group(['middleware'=>'admin_auth'],function() {
    Route::get('admin/dashboard', [userController::class, 'index'])->name('admin.dashboard');
});

Route::get('/logout',function(){
    session()->forget('USER_LOGIN');
    session()->flash('error','Logout sucessfully');
    return redirect('/');
});
