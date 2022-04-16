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
        $db = [
            'interaction' => DB::table('interaction')->get(),
        ];
        return view('admin/interactionMaster/intraction', $db);
    }

    public function storeInteraction(Request $request)
    {
        return $request->all();
    }
}
