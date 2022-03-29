<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashBoardController;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\LeadController;
use App\Http\Controllers\admin\ProjectMasterController;
use App\Http\Controllers\admin\DealController;



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
    return view('admin/dashboard/login');
});
Route::post('admin/loginauth', [AuthController::class, 'loginAuth'])->name('loginAuth');


Route::group(['middleware' => 'adminAuth'], function () {

    Route::get('/logout', function () {
        session()->forget('ADMIN_LOGIN');
        // session()->forget('USER_ID');
        // session()->forget('USER_NAME');
        session()->flash('msg', 'Logout Successfully');
        return redirect('/');
    })->name('logout');

    Route::get('/dashboard', [DashBoardController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard/lead', [DashBoardController::class, 'leadDashboard'])->name('leadDashboard');


    Route::get('/registration', [UserController::class, 'registration'])->name('registration');


    Route::get('/leadregistration', [LeadController::class, 'leadRegistration'])->name('leadregistration');
    Route::get('/campaignmaster', [LeadController::class, 'campaignMaster'])->name('campaign');
    Route::get('/leadsource', [LeadController::class, 'leadSource'])->name('leadsource');

    Route::get('/project_registration', [ProjectMasterController::class, 'projectRegistration'])->name('projectregistration');
    Route::get('/project_developer_registration', [ProjectMasterController::class, 'developerRegistration'])->name('developer');
    Route::get('/project_facility_registration', [ProjectMasterController::class, 'facilityRegistration'])->name('facility');
    Route::get('/project_loanFacility_registration', [ProjectMasterController::class, 'loanFacilityRegistration'])->name('loanFacility');
    
    Route::get('/deal_registration', [DealController::class, 'dealRegistration'])->name('dealRegistration');
    

});
