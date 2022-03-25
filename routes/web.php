<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashBoardController;
use App\Http\Controllers\admin\AuthController;



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




// Route::get('/', function () {
//     return view('welcome');
// });
Route::post('/', [AuthController::class, 'Registration'])->name('registration');


Route::group([], function () {

    Route::get('/dashboard', [DashBoardController::class, 'dashboard'])->name('dashboard');



});
