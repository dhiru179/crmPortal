<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\party;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function Registration(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'user' => 'required|max:120',
                'phone' => 'required|min:11|numeric|unique:users',
                'password' => 'nullable|string|min:6',
                'password_confirmation' => 'required_with:password|same:password|min:6'
            ]);

            if ($validator->fails()) {

                return ['status' => 'error', 'msg' => $validator->errors()];
            }
           $data = [
                'username' => $request->user,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
            ];
            DB::table('users')->insert($data);

            return ['status' => true, 'msg' => 'user create successfully'];
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function loginAuth(Request $request)
    {
        $user = DB::table('users')->where(['phone' => trim($request->phone)]);
        $isExist = $user->first();
        if ($isExist) {
            $result = $user->get()[0];
            if (Hash::check($request->password,$result->password)) {
                $request->session()->put('ADMIN_LOGIN',true);
                $request->session()->put('USER_ID',$result->id);
                $request->session()->put('USER_NAME',$result->username);
                return ['auth'=>true,'url'=>$_SERVER['HTTP_HOST'].'/admin'];
            }
            else {
                return ['status' => true, 'msg' => 'Invalid Password'];
            }
        } else {
            return ['status' => true, 'msg' => 'Invalid Mobile Number'];
        }
    }

    public function ForgetPassword()
    {
    }
}
