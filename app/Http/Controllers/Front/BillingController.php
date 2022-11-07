<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Billing;
use App\Models\Package;
use App\Models\PackageCategories;
use App\Models\Subscription;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    public function getBillingData()
    {
        if (!auth()->user()) {
            return redirect('/login');
        }
        $billing_data = Billing::orderBy('id', 'DESC')->get();
        $category_info = PackageCategories::orderBy('id', 'DESC')->where('status', 'Active')->get();
        $subscription_data = Subscription::orderBy('id', 'DESC')->where('user_id', auth()->user()->id)->get();
        $package_info = Package::orderBy('id', 'Desc')->pluck('name', 'id');
        return view('front.billing.billing')->with([
            'billing_data' => $billing_data,
            'subscription_data' => $subscription_data,
            'package_info' => $package_info,
            'category_info' => $category_info
        ]);
    }

}
