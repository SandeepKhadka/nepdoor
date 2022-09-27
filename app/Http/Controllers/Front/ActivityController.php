<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function getActivityData(){
        $activity_data = Activity::orderBy('id', 'DESC')->where('user_id', auth()->user()->id)->get();
        return view('front.activity.activity')->with('activity_data',$activity_data);
    }
}
