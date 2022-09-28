<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Billing;
use App\Models\Package;
use App\Models\Subscription;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    public function getBillingData(){
        $billing_data = Billing::orderBy('id', 'DESC')->get();
        $subscription_data = Subscription::orderBy('id', 'DESC')->where('user_id', auth()->user()->id)->get();
        // dd($subscription_data->billNo);
        // $billing_info = Billing::orderBy('id', 'Desc')->where('status', 'Active')->pluck('amount', 'id');
        $package_info = Package::orderBy('id', 'Desc')->pluck('name', 'id');
        return view('front.billing.billing')->with([
            'billing_data' => $billing_data,
            'subscription_data' => $subscription_data,
            // 'billing_info' => $billing_info,

            'package_info' => $package_info
        ]);
    }
}
