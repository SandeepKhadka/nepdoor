<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\HelpCenter;
use App\Models\PackageCategories;
use Illuminate\Http\Request;

class HelpCenterController extends Controller
{
    public function helpCenter(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != ""){
            $helpCenter_info = HelpCenter::where('title','LIKE',"%$search%")->get();
        } else{
            $helpCenter_info = HelpCenter::orderBy('order_id', 'ASC')->where('status', 'Active')->get();
        }
        // dd($search);
        $data = compact('helpCenter_info','search');
        $category_info = PackageCategories::orderBy('id', 'DESC')->where('status', 'Active')->get();
        return view('front.helpCenter.helpCenterView')->with($data)->with('category_info', $category_info);
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
        $category_info = PackageCategories::orderBy('id', 'DESC')->where('status', 'Active')->get();
        return view('front.helpCenter.helpCenterView')->with($data)->with('category_info', $category_info);
    }

}
