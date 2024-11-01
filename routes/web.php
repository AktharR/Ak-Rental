<?php

use App\Http\Controllers\bookingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\regiterController;
use App\Http\Controllers\rentUserController;
use App\Http\Controllers\userDashController;

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

Route::get('/', [UserController::class, 'index'])->name('home');
Route::get('/Home/booking/{id}', [UserController::class, 'create'])->name('user.view_booking');
Route::post('/Home/booking/{id}', [UserController::class, 'store'])->name('user.store');



Route::middleware('isAdmin')->group(function(){

    Route::get('/Admin/dminDashboard', [CarController::class, 'index'])->name('admin.dashboard');
    Route::get('/Admin/addCar', [CarController::class, 'create'])->name('admin.addCar');
    Route::post('/Admin/addCar', [CarController::class, 'store'])->name('admin.storeCar');
    Route::get('/Admin/viewCar', [CarController::class, 'show'])->name('admin.viewCar');
    Route::get('/Admin/editCar/{id}', [CarController::class, 'edit'])->name('admin.editCar');
    Route::post('/Admin/editCar/{id}', [CarController::class, 'update'])->name('admin.update');
    Route::get('/Admin/viewCar/{id}', [CarController::class, 'destroy'])->name('admin.delete');
    
    Route::get('/Admin/bookingDetails', [rentUserController::class, 'index'])->name('admin.bookingDetails');

});



Route::get('/Auth/register', [regiterController::class, 'create'])->name('user.register');
Route::post('/Auth/register', [regiterController::class, 'store'])->name('user.Registerstore');


Route::get('/Auth/login', [loginController::class, 'create'])->name('user.login');
Route::post('/Auth/login', [loginController::class, 'store'])->name('user.login01');

Route::post('/Auth/logout', [loginController::class, 'destory'])->name('user.logout');


Route::get('/Home/userDashboard', [userDashController::class, 'index'])->name('user.dashboaard')->middleware('isUser');
Route::get('/Home/userCars', [userDashController::class, 'show'])->name('user.viewCar')->middleware('isUser');