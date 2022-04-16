<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dealRegistration()
    {
        $db = [
            'deal_master'=>DB::table('deal_master')->get(),
        ];
        return view('admin/dealMaster/dealRegistration',$db);
    }

    public function storeDeal(Request $request)
    {
        return $request->all();
    }

}