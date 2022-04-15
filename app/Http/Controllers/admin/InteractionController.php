<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InteractionController extends Controller
{
    public function interaction()
    {
        return view('admin/interactionMaster/intraction');
    }

}
