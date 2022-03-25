<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;


class DashBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        return view('admin/dashboard/dashboard');
    }

}