<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;


class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function leadRegistration()
    {
        return view('admin/leadmaster/leadregistration');
    }
    public function campaignMaster()
    {
        return view('admin/leadmaster/campaign');
    }
    public function leadSource()
    {
        return view('admin/leadmaster/leadsource');
    }

}