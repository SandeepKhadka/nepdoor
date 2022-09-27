<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\HelpCenter;
use Illuminate\Http\Request;

class HelpCenterController extends Controller
{
    public function helpCenter(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != ""){
            $helpCenter_info = HelpCenter::where('title','LIKE',"%$search%")->get();
        } else{
            $helpCenter_info = HelpCenter::orderBy('order_id', 'Desc')->where('status', 'Active')->get();
        }
        // dd($search);
        $data = compact('helpCenter_info','search');
        return view('customer.helpCenter.helpCenterView')->with($data);
    }

    public function searchHelpCenter(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != ""){
            $helpCenter_info = HelpCenter::where('title','LIKE',"%$search%")->get();
        } else{
            $helpCenter_info = HelpCenter::orderBy('order_id', 'Desc')->where('status', 'Active')->get();
        }
        // dd($search);
        $data = compact('helpCenter_info','search');
        return view('customer.helpCenter.helpCenterView')->with($data);
    }

}
