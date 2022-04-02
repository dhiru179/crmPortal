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
    public function Todo()
    {
        return view('admin/dashboard/todo');
    }
    public function Calender()
    {
        return view('admin/dashboard/calender');
    }
    public function leadDashboard()
    {
        return view('admin/dashboard/leadDashboard');
    }

}