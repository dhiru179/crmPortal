<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;


class DealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dealRegistration()
    {
        return view('admin/dealMaster/dealRegistration');
    }

}