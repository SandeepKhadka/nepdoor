<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function getSubscriptionData()
    {
        if (!auth()->user()) {
            return redirect('/login');
        }
        $subscription_data = Subscription::orderBy('id', 'DESC')->where('user_id', auth()->user()->id)->get();
        $package_info = Package::orderBy('id', 'Desc')->with('cat_info')->where('status', 'Active')->get();
        return view('front.subscription.subscription')->with([
            'subscription_data' => $subscription_data,
            'package_info' => $package_info
        ]);
    }
}
