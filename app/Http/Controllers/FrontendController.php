<?php

namespace App\Http\Controllers;

use App\Models\Billing;
use App\Models\Package;
use App\Models\PackageCategories;
use App\Models\Subscription;
// use App\Models\HelpCenter;
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

    public function getSubscriptionDetail()
    {
        $category_info = PackageCategories::orderBy('id', 'DESC')->where('status', 'Active')->get();
        $package_info = Package::orderBy('id', 'ASC')->where('status', 'Active')->get();
        return view('index')->with([
            'package_info' => $package_info,
            'category_info' => $category_info
        ]);
    }

    public function storeFormData(Request $request)
    {
        if ($request->package_id != null && $request->amount != null && $request->voucher != null) {
            $bills = $request->except(['_token', 'package', 'message']);
            $bill_rules = Billing::getRules();
            $this->validate($request, $bill_rules);
            if ($request->has('voucher')) {
                $voucher = $request->voucher;
                $file_name = uploadImage($voucher, 'billing', '125x125');
                if ($file_name) {
                    $bills['voucher'] = $file_name;
                } else {
                    notify()->error('Sorry! there was problem in sending voucher image.');
                }
            }
            $bills['billNo'] = 'bil-' . rand(0, 99) . '-' . auth()->user()->id;
            $this->billing->fill($bills);
            $bill_status = $this->billing->save();

            if ($bill_status == true) {

                $subscription = $request->except(['_token', 'voucher', 'amount']);
                $subscription_rules = Subscription::getRules();
                $this->validate($request, $subscription_rules);
                $endDate = Carbon::today()->addDays(30);
                $subscription['end_date'] = $endDate;
                $subscription['user_id'] = auth()->user()->id;
                $subscription['billing_id'] = $bills['billNo'];

                $this->subscription->fill($subscription);
                $subscription_status = $this->subscription->save();
            } else {
                notify()->error('Sorry! there was error in sending form.');
            }
        }

        if (isset($subscription_status) && $subscription_status == true) {
            notify()->success('Form sent successfully.');
        } else {
            notify()->error('Sorry! there was error in sending form.');
        }
        return redirect()->back();
    }

    // public function userHome()
    // {
    //     $package_info = Package::orderBy('id', 'ASC')->where('status', 'Active')->get();
    //     $category_info = PackageCategories::orderBy('id', 'DESC')->where('status', 'Active')->get();
    //     return view('front.home.userHome')->with([
    //         'package_info' => $package_info,
    //         'category_info' => $category_info
    //     ]);
    // }

    public function package($categories, $id)
    {
        // dd($package);
        $category_check = PackageCategories::find($id);
        // dd($category_check);
        if (!$category_check) {
            notify()->error('This category doesnot exists');
            return redirect()->back();
        }
        $category_info = PackageCategories::orderBy('id', 'DESC')->where('status', 'Active')->get();
        $package_info = Package::orderBy('id', 'Desc')->with('cat_info')->where('status', 'Active')->get();
        return view('package_form')->with([
            'package_info' => $package_info,
            'category_info' => $category_info,
            'category_title' => $categories
        ]);
    }

    // public function digitalMarketing()
    // {
    //     $package_info = Package::orderBy('id', 'Desc')->with('cat_info')->where('status', 'Active')->get();
    //     return view('digitalMarketing')->with([
    //         'package_info' => $package_info
    //     ]);
    // }

    // public function seo()
    // {
    //     $package_info = Package::orderBy('id', 'Desc')->with('cat_info')->where('status', 'Active')->get();
    //     return view('seo')->with([
    //         'package_info' => $package_info
    //     ]);
    // }

    // public function training()
    // {
    //     $package_info = Package::orderBy('id', 'Desc')->with('cat_info')->where('status', 'Active')->get();
    //     return view('training')->with([
    //         'package_info' => $package_info
    //     ]);
    // }

    // public function basic()
    // {
    //     $package_info = Package::orderBy('id', 'Desc')->with('cat_info')->where('status', 'Active')->get();
    //     $billing_info = Billing::orderBy('id', 'Desc')->where('status', 'Active')->get();
    //     return view('basic')->with([
    //         'package_info' => $package_info,
    //         'billing_info' => $billing_info
    //     ]);
    // }

    public function billing()
    {
        $package_info = Package::orderBy('id', 'Desc')->with('cat_info')->where('status', 'Active')->get();
        return view('training')->with([
            'package_info' => $package_info
        ]);
    }

    public function getIndexData()
    {
        $package_info = Package::orderBy('id', 'ASC')->where('status', 'Active')->get();
        return view('index')->with([
            'package_info' => $package_info
        ]);
    }
}
