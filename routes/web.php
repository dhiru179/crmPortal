<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashBoardController;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\LeadController;
use App\Http\Controllers\admin\ProjectMasterController;
use App\Http\Controllers\admin\DealController;
use App\Http\Controllers\admin\ReportController;
use App\Http\Controllers\admin\InteractionController;




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
    Route::get('/dashboard_todo', [DashBoardController::class, 'Todo'])->name('todo');
    Route::get('/dashboard_calender', [DashBoardController::class, 'Calender'])->name('calender');
    Route::get('/dashboard/lead', [DashBoardController::class, 'leadDashboard'])->name('leadDashboard');


    Route::get('/registration', [UserController::class, 'registration'])->name('registration');
    Route::post('/registration', [UserController::class, 'storeUserRegistration'])->name('storeUserRegistration');
    Route::get('/master/desigination', [UserController::class, 'desigination'])->name('desigination');
    Route::post('/master/desigination', [UserController::class, 'storeDesigination'])->name('storeDesigination');
    Route::get('/master/employee_status', [UserController::class, 'empStatus'])->name('empStatus');
    
    

    Route::get('/lead_registration', [LeadController::class, 'leadRegistration'])->name('leadregistration');
    Route::post('/lead_registration', [LeadController::class, 'storeLead'])->name('storeLead');
    Route::post('/lead_delete', [LeadController::class, 'deleteLead'])->name('leadDelete');
    Route::get('/campaignmaster', [LeadController::class, 'campaignMaster'])->name('campaign');
    Route::post('/campaignmaster', [LeadController::class, 'storeCampaignData'])->name('storeCampaignData');
    Route::get('/delete_campaign', [LeadController::class, 'deleteCampaignData'])->name('deleteCampaign');
    Route::get('/leadsource', [LeadController::class, 'leadSource'])->name('leadsource');
    Route::post('/leadsource', [LeadController::class, 'storeLeadSourceData'])->name('lead_source');
    Route::get('/delete_lead_source', [LeadController::class, 'deleteLeadSource'])->name('deleteLeadSource');

    Route::get('/project_registration', [ProjectMasterController::class, 'projectRegistration'])->name('projectregistration');
    Route::post('/project_registration', [ProjectMasterController::class, 'storeProject'])->name('store_project_registration');
    Route::get('/project_developer_registration', [ProjectMasterController::class, 'developerRegistration'])->name('developer');
    Route::post('/project_developer_registration', [ProjectMasterController::class, 'storeDeveloper'])->name('developer_reg');
    Route::get('/project_developer_delete', [ProjectMasterController::class, 'deleteDeveloper'])->name('developer_delete');

    Route::get('/project_facility_registration', [ProjectMasterController::class, 'facilityRegistration'])->name('facility');
    Route::post('/project_facility_registration', [ProjectMasterController::class, 'storeFacilityData'])->name('facility_reg');
    Route::get('/project_facility_delete', [ProjectMasterController::class, 'deleteFacilityData'])->name('facility_delete');

    Route::get('/project_loanFacility_registration', [ProjectMasterController::class, 'loanFacilitatorRegistration'])->name('loanFacility');
    Route::post('/project_loanFacility_registration', [ProjectMasterController::class, 'storeLoanFacilitatorData'])->name('facilitator_reg');
    Route::get('/project_loanFacility_delete', [ProjectMasterController::class, 'deleteLoanFacilitatorData'])->name('loanFacility_delete');

    Route::get('/project_location', [ProjectMasterController::class, 'location'])->name('get_location');
    Route::post('/project_location', [ProjectMasterController::class, 'storeLocation'])->name('store_locatopn');
    Route::get('/project_location_delete', [ProjectMasterController::class, 'deleteLocation'])->name('delete_location');
    
    
    Route::get('/deal_registration', [DealController::class, 'dealRegistration'])->name('dealRegistration');
    Route::post('/deal_registration', [DealController::class, 'storeDeal'])->name('store_deal');

    Route::get('/interaction_registration', [InteractionController::class, 'interaction'])->name('interaction');
    Route::post('/interaction_registration', [InteractionController::class, 'storeInteraction'])->name('store_interaction');

    

     Route::get('/report_lead_wise', [ReportController::class, 'leadWise'])->name('lead_wise');
     Route::get('/report_advisor_wise', [ReportController::class, 'advisorWise'])->name('advisor_wise');
     Route::get('/report_team_lead_wise', [ReportController::class, 'teamLeadWise'])->name('team_lead_wise'); 
     Route::get('/report_overall_lead_wise', [ReportController::class, 'overallLeadWise'])->name('overall_lead_wise');
     Route::get('/report_project_wise', [ReportController::class, 'projectWise'])->name('project_wise');
     Route::get('/report_campaign_wise', [ReportController::class, 'campaignWise'])->name('campaign_wise');
     Route::get('/report_source_wise', [ReportController::class, 'sourceWise'])->name('source_wise'); 
     Route::get('/report_date_wise', [ReportController::class, 'dateWise'])->name('date_wise');


});
