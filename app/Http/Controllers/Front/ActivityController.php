<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function getActivityData()
    {
        if (!auth()->user()) {
            return redirect('/login');
        }
        $activity_data = Activity::orderBy('id', 'DESC')->get()->where('user_id', auth()->user()->id);
        // dd($activity_data);
        return view('front.activity.activity')->with('activity_data', $activity_data);
    }
}
