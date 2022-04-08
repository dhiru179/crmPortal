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

    public function storeLead(Request $request)
    {
        try {
          
            $validator = Validator::make($request->all(), [

                'firstName' => 'required',
                'mobile' => 'required',
                'lead_status' => 'required',

            ]);

            if ($validator->fails()) {

                return ['status' => 'error', 'msg' => $validator->errors()];
            }

            $data = [
                'campaign_id' => $request->Campaign,
                'lead_source_id' => $request->LeadSource,
                'first_name' => $request->firstName,
                'last_name' => $request->lastName,
                'mobile' => $request->mobile,
                'email' => $request->email,
                'address' => $request->address,
                'city' => $request->city,
                'description' => $request->description,
                'status' => $request->lead_status,
                'creation_date' => $request->creationDate,
                'budget' => $request->budget,
                'bhk' => $request->bhk,
                'toilets' => $request->toilets,
                'preferred_floor' => $request->PreferredFloor,
                'sbu_area' => $request->sbuArea,
                'parking' => $request->parking,
                'preferred_facing' => $request->PreferredFacing,
                'preferred_location' => $request->PreferredLocation,
                // $request->AssignedTo,
                // $request->InterestedIn,
                // $request->ReferredBy,

            ];
            $filterData = array_filter($data, function ($a) {
                return isset($a);
            });
            $lead_source_id = $request->lead_source_id;
            if ($lead_source_id > 0) {
                //update
                DB::table('lead_master')->where(['id' => $lead_source_id])->update($filterData);
                return ['status' => true, 'msg' => 'Data Update Successfully'];
            } else {
                //insert
                DB::table('lead_master')->insert($filterData);
                return ['status' => true, 'msg' => 'Data insert Successfully'];
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }


    public function campaignMaster()
    {
        $db = [
            'campaign' => DB::table('campaign_master')->get(),
        ];
        return view('admin/leadmaster/campaign', $db);
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
            $campaign_id = $request->campaign_id;
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
        $db = [
            'lead_source' => DB::table('lead_source')->get(),
        ];
        return view('admin/leadmaster/leadsource', $db);
    }

    public function storeLeadSourceData(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [

                'source_code' => 'required',
                'source_name' => 'required',

            ]);

            if ($validator->fails()) {

                return ['status' => 'error', 'msg' => $validator->errors()];
            }

            $data = [
                'source_code' => $request->source_code,
                'source_name' => $request->source_name,
            ];
            $filterData = array_filter($data, function ($a) {
                return isset($a);
            });
            $lead_source_id = $request->lead_source_id;
            if ($lead_source_id > 0) {
                //update
                DB::table('lead_source')->where(['id' => $lead_source_id])->update($filterData);
                return ['status' => true, 'msg' => 'Data Update Successfully'];
            } else {
                //insert
                DB::table('lead_source')->insert($filterData);
                return ['status' => true, 'msg' => 'Data insert Successfully'];
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
