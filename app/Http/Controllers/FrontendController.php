<?php

namespace App\Http\Controllers;

use App\Models\Billing;
use App\Models\Package;
use App\Models\PackageCategories;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Carbon\Carbon;


class FrontendController extends Controller
{

    protected $billing = null;
    protected $subscription = null;

    public function __construct(Billing $billing, Subscription $subscription)
    {
        $this->billing = $billing;
        $this->subscription = $subscription;
    }

    public function storeDigitalFormData(Request $request)
    {
        $bills = $request->except(['_token', 'package', 'message']);
        $bill_rules = Billing::getRules();
        $this->validate($request, $bill_rules);
        if ($request->has('voucher')) {
            $voucher = $request->voucher;
            $file_name = uploadImage($voucher, 'billing', '125x125');
            if ($file_name) {
                $bills['voucher'] = $file_name;
            }
        }
        $bills['billNo'] = 'bil-' . rand(0, 99) . '-' . auth()->user()->id;
        $this->billing->fill($bills);
        $bill_status = $this->billing->save();
        

        $subscription = $request->except(['_token', 'voucher', 'amount']);
        $subscription_rules = Subscription::getRules();
        $this->validate($request, $subscription_rules);
        $endDate = Carbon::today()->addDays(30);
        $subscription['end_date'] = $endDate;
        $subscription['user_id'] = auth()->user()->id;
        $subscription['billing_id'] = $bills['billNo'];

        $this->subscription->fill($subscription);
        $subscription_status = $this->subscription->save();

        return redirect()->back();
    }

    public function digitalMarketing()
    {
        $package_info = Package::orderBy('id', 'Desc')->with('cat_info')->where('status', 'Active')->get();
        return view('digitalMarketing')->with([
            'package_info' => $package_info
        ]);
    }

    public function seo()
    {
        $package_info = Package::orderBy('id', 'Desc')->with('cat_info')->where('status', 'Active')->get();
        return view('seo')->with([
            'package_info' => $package_info
        ]);
    }

    public function training()
    {
        $package_info = Package::orderBy('id', 'Desc')->with('cat_info')->where('status', 'Active')->get();
        return view('training')->with([
            'package_info' => $package_info
        ]);
    }
    
    public function basic()
    {
        $package_info = Package::orderBy('id', 'Desc')->with('cat_info')->where('status', 'Active')->get();
        $billing_info = Billing::orderBy('id', 'Desc')->where('status', 'Active')->get();
        return view('basic')->with([
            'package_info' => $package_info,
            'billing_info' => $billing_info
        ]);
    }
}
