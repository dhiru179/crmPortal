<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function registration()
    {
        return view('admin/usermaster/registration');
    }

}