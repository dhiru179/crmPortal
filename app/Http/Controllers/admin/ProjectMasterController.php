<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;


class ProjectMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function projectRegistration()
    {
        return view('admin/projectMaster/projectRegistration');
    }
    public function developerRegistration()
    {
        return view('admin/projectMaster/devloper');
    }
    public function facilityRegistration()
    {
        return view('admin/projectMaster/facility');
    }
    public function loanFacilityRegistration()
    {
        return view('admin/projectMaster/loanFacility');
    }


}