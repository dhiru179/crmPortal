<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
            'desigination' => DB::table('desiganation')->get(),
        

        ];
        return view('admin/usermaster/registration', $db);
    }

    public function empStatus()
    {
        return view('admin/usermaster/empstatus');
    }

    public function desigination()
    {
        return view('admin/usermaster/desigination');
    }

    public function saveRegistration(Request $request)
    {
        try {
            return [$request->all(), Auth::user()];
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
