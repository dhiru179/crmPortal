<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReportController extends Controller
{
    public function leadWise()
    {
        return view('admin/report/lead_wise');
    }
    public function advisorWise()
    {
        return view('admin/report/advisor_wise');
    }
    public function teamLeadWise()
    {
        return view('admin/report/team_lead_wise');
    }
    public function overallLeadWise()
    {
        return view('admin/report/overall_lead_wise');
    }

    public function projectWise()
    {
        return view('admin/report/project_wise');
    }
    public function campaignWise()
    {
        return view('admin/report/campaign_wise');
    }
    public function sourceWise()
    {
        return view('admin/report/source_wise');
    }
    public function dateWise()
    {
        return view('admin/report/date_wise');
    }

}