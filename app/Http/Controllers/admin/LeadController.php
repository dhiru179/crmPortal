<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

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
        $db =[
            'campaign'=>DB::table('campaign_master')->get(),
        ];
        return view('admin/leadmaster/campaign',$db);
    }
    public function storeCampaignData(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [

                'budget' => 'required|numeric',
                'campaignName' => 'required',
                'startDate' => 'required',

            ]);

            if ($validator->fails()) {

                return ['status' => 'error', 'msg' => $validator->errors()];
            }

            $data = [
                'campaign_name' => $request->campaignName,
                'budget' => $request->budget,
                'campagin_status' => $request->campaginStatus,
                'assign_to' => $request->assign_to,
                'description' => $request->description,
                'end_date' => $request->endDate,
                'start_date' => $request->startDate,
            ];
            $filterData = array_filter($data, function ($a) {
                return isset($a);
            });
            $campaign_id = $request->id;
            if ($campaign_id > 0) {
                //update
                DB::table('campaign_master')->where(['id' => $campaign_id])->update($filterData);
                return ['status' => true, 'msg' => 'Data Update Successfully'];
            } else {
                //insert
                DB::table('campaign_master')->insert($filterData);
                return ['status' => true, 'msg' => 'Data insert Successfully'];
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function leadSource()
    {
        return view('admin/leadmaster/leadsource');
    }
}
