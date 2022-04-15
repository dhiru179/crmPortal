<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Request $request)
    {

        return $request->all();
    }
    public function registration()
    {
        $db = [
            'users_type' => DB::table('users_type')->get(),
            'desigination' => DB::table('desigination')->get(),
            'users' => DB::table('users')
                        ->leftJoin('desigination','users.desigination_id','=','desigination.id')
                        ->leftJoin('users_type','users.user_type_id','=','users_type.id')
                        ->select('users.*','desigination.desigination','users_type.user_type')
                        ->get(),
        ];
        return view('admin/usermaster/registration', $db);
    }

    public function storeUserRegistration(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'firstName' => 'required',
                'empid' => 'required',
                'desigination' => 'required',
                'phone' => 'required',
                'emp_status' => 'required|in:Active,Absent,Terminated,Inactive',
            ]);

            if ($validator->fails()) {

                return ['status' => 'error', 'msg' => $validator->errors()];
            }

            $data = [
                'first_name' => $request->firstName,
                'last_name' => $request->lastName,
                'emp_id' => $request->empid,
                'user_type_id' => $request->userType,
                'desigination_id' => $request->desigination,
                'email' => $request->email,
                'phone' => $request->phone,
                'team_leaders' => $request->team_leaders,
                'emp_status'=>$request->emp_status,
            ];
            $filterData = array_filter($data, function ($a) {
                return isset($a);
            });
            $user_id = $request->user_id;
            if ($user_id > 0) {
                //update
                DB::table('users')->where(['id' => $user_id])->update($data);
                return ['status' => true, 'msg' => 'Data Update Successfully'];
            } else {
                //insert
                DB::table('users')->insert($filterData);
                return ['status' => true, 'msg' => 'Data insert Successfully'];
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function deleteUser(Request $request)
    {
        try {
            DB::table('users')->where(['id' => $request->id])->delete();
            session()->flash('msg', 'Delete Successfully');
            return redirect('registration');
        } catch (\Throwable $th) {
            if ($th->getCode() == 23000) {
                session()->flash('msg', 'This is already exist');
                return redirect('registration');
            } else {
                abort(404);
                return [$th->getMessage(), $th->getCode()];
            }
        }
    }
    public function empStatus()
    {
        return view('admin/usermaster/empstatus');
    }

    public function desigination()
    {
        $db = [
            'desigination' => DB::table('desigination')->get(),
        ];
        return view('admin/usermaster/desigination', $db);
    }
    public function storeDesigination(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'desigination_code' => 'required',
                'desigination' => 'required',
                'department' => 'required',
            ]);

            if ($validator->fails()) {

                return ['status' => 'error', 'msg' => $validator->errors()];
            }

            $data = [
                'desigination_code' => $request->desigination_code,
                'desigination' => $request->desigination,
                'department' => $request->department,
                'description' => $request->description,
            ];
            $filterData = array_filter($data, function ($a) {
                return isset($a);
            });
            $desigination_id = $request->desigination_id;
            if ($desigination_id > 0) {
                //update
                DB::table('desigination')->where(['id' => $desigination_id])->update($data);
                return ['status' => true, 'msg' => 'Data Update Successfully'];
            } else {
                //insert
                DB::table('desigination')->insert($filterData);
                return ['status' => true, 'msg' => 'Data insert Successfully'];
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function deleteDesigination(Request $request)
    {
        try {
            DB::table('desigination')->where(['id' => $request->id])->delete();
            session()->flash('msg', 'Delete Successfully');
            return redirect('master/desigination');
        } catch (\Throwable $th) {
            if ($th->getCode() == 23000) {
                session()->flash('msg', 'This is already exist');
                return redirect('master/desigination');
            } else {
                abort(404);
                return [$th->getMessage(), $th->getCode()];
            }
        }
    }

 
}
