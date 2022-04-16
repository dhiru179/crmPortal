<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function projectRegistration()
    {
        $db = [
            'project_master' => DB::table('project_master')->get(),
        ];
        return view('admin/projectMaster/projectRegistration',$db);
    }

    public function storeProject(Request $request)
    {
        return $request->all();
    }
    public function developerRegistration()
    {
        $db = [
            'developer' => DB::table('developer_reg')->get(),
        ];
        return view('admin/projectMaster/devloper', $db);
    }
    public function storeDeveloper(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [

                'developer_name' => 'required',
            ]);

            if ($validator->fails()) {

                return ['status' => 'error', 'msg' => $validator->errors()];
            }

            $data = [
                'developer_name' => $request->developer_name,
            ];
            $filterData = array_filter($data, function ($a) {
                return isset($a);
            });
            $developer_reg_id = $request->developer_reg_id;
            if ($developer_reg_id > 0) {
                //update
                DB::table('developer_reg')->where(['id' => $developer_reg_id])->update($filterData);
                return ['status' => true, 'msg' => 'Data Update Successfully'];
            } else {
                //insert
                DB::table('developer_reg')->insert($filterData);
                return ['status' => true, 'msg' => 'Data insert Successfully'];
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function deleteDeveloper(Request $request)
    {
        try {
            DB::table('developer_reg')->where(['id' => $request->id])->delete();
            session()->flash('msg', 'Delete Successfully');
            return redirect('project_developer_registration');
        } catch (\Throwable $th) {
            if ($th->getCode() == 23000) {
                session()->flash('msg', 'This is already exist');
                return redirect('project_developer_registration');
            } else {
                abort(404);
                return [$th->getMessage(), $th->getCode()];
            }
        }
    }

    public function facilityRegistration()
    {
        $db = [
            'facility_reg' => DB::table('facility_reg')->get(),
        ];
        return view('admin/projectMaster/facility', $db);
    }
    public function storeFacilityData(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [

                'facility_name' => 'required',
                'facility_type' => 'required',
                // 'image_name' =>  'max:5000'
            ]);

            if ($validator->fails()) {

                return ['status' => 'error', 'msg' => $validator->errors()];
            }

            if ($request->hasFile('file')) {
                $image = $request->file('file');
                $image_name = time() . '_' . $image->getClientOriginalName();;
                $image->storeAs('/public', $image_name);
            }
            $data = [
                'facility_name' => $request->facility_name,
                'facility_type' => $request->facility_type,
                'image_name' => !empty($image_name) ? $image_name : "",
            ];
            $filterData = array_filter($data, function ($a) {
                return isset($a);
            });
            $facility_reg_id = $request->facility_reg_id;
            if ($facility_reg_id > 0) {
                //update
                DB::table('facility_reg')->where(['id' => $facility_reg_id])->update($data);
                return ['status' => true, 'msg' => 'Data Update Successfully'];
            } else {
                //insert
                DB::table('facility_reg')->insert($filterData);
                return ['status' => true, 'msg' => 'Data insert Successfully'];
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function deleteFacilityData(Request $request)
    {
        try {
            DB::table('facility_reg')->where(['id' => $request->id])->delete();
            session()->flash('msg', 'Delete Successfully');
            return redirect('project_facility_registration');
        } catch (\Throwable $th) {
            if ($th->getCode() == 23000) {
                session()->flash('msg', 'This is already exist');
                return redirect('project_facility_registration');
            } else {
                abort(404);
                return [$th->getMessage(), $th->getCode()];
            }
        }
    }

    public function loanFacilitatorRegistration()
    {
        $db = [
            'facilitator_reg' => DB::table('facilitator_reg')->get(),
        ];

        return view('admin/projectMaster/loanFacility', $db);
    }
    public function storeLoanFacilitatorData(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [

                'facilitator_name' => 'required',
                // 'image_name' =>  'max:5000'
            ]);

            if ($validator->fails()) {

                return ['status' => 'error', 'msg' => $validator->errors()];
            }

            if ($request->hasFile('file')) {
                $image = $request->file('file');
                $image_name = time() . '_' . $image->getClientOriginalName();;
                $image->storeAs('/public', $image_name);
            }
            $data = [
                'facilitator_name' => $request->facilitator_name,
                'image_name' => !empty($image_name) ? $image_name : "",
            ];
            $filterData = array_filter($data, function ($a) {
                return isset($a);
            });
            $facilitator_reg_id = $request->facilitator_reg_id;
            if ($facilitator_reg_id > 0) {
                //update
                DB::table('facilitator_reg')->where(['id' => $facilitator_reg_id])->update($data);
                return ['status' => true, 'msg' => 'Data Update Successfully'];
            } else {
                //insert
                DB::table('facilitator_reg')->insert($filterData);
                return ['status' => true, 'msg' => 'Data insert Successfully'];
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function deleteLoanFacilitatorData(Request $request)
    {
        try {
            DB::table('facilitator_reg')->where(['id' => $request->id])->delete();
            session()->flash('msg', 'Delete Successfully');
            return redirect('project_loanFacility_registration');
        } catch (\Throwable $th) {
            if ($th->getCode() == 23000) {
                session()->flash('msg', 'This is already exist');
                return redirect('project_loanFacility_registration');
            } else {
                abort(404);
                return [$th->getMessage(), $th->getCode()];
            }
        }
    }
    
    public function location()
    {
        $db = [
            'location' => DB::table('preferred_location')->get(),
        ];

        return view('admin/projectMaster/location', $db);
    }
    public function storeLocation(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [

                'location' => 'required',
                'city' => 'required',
            ]);

            if ($validator->fails()) {

                return ['status' => 'error', 'msg' => $validator->errors()];
            }

          
            $data = [
                'location' => $request->location,
                'city' => $request->city,
            ];
            $filterData = array_filter($data, function ($a) {
                return isset($a);
            });
            $location_id = $request->location_id;
            if ($location_id > 0) {
                //update
                DB::table('preferred_location')->where(['id' => $location_id])->update($data);
                return ['status' => true, 'msg' => 'Data Update Successfully'];
            } else {
                //insert
                DB::table('preferred_location')->insert($filterData);
                return ['status' => true, 'msg' => 'Data insert Successfully'];
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    
    public function deleteLocation(Request $request)
    {
        try {
            DB::table('preferred_location')->where(['id' => $request->id])->delete();
            session()->flash('msg', 'Delete Successfully');
            return redirect('project_location');
        } catch (\Throwable $th) {
            if ($th->getCode() == 23000) {
                session()->flash('msg', 'This is already exist');
                return redirect('project_location');
            } else {
                abort(404);
                return [$th->getMessage(), $th->getCode()];
            }
        }
    }
}
