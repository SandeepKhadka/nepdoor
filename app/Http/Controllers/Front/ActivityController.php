<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\PackageCategories;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function getActivityData()
    {
        if (!auth()->user()) {
            return redirect('/login');
        }
        $category_info = PackageCategories::orderBy('id', 'DESC')->where('status', 'Active')->get();
        $activity_data = Activity::orderBy('id', 'DESC')->get()->where('user_id', auth()->user()->id);
        // dd($activity_data);
        return view('front.activity.activity')->with('activity_data', $activity_data)->with('category_info', $category_info);
    }
}
