<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\PackageCategories;
use App\Models\Subscription;
use Illuminate\Http\Request;

class UserHomeController extends Controller
{
    // public function getUserHomeData()
    // {
    //     $package_info = Package::orderBy('id', 'ASC')->with('cat_info')->where('status', 'Active')->get();
    //     $data = Subscription::where('cat_id', 'Training')->get('id');
    //     $trainingNum = count($data);

    //     $data = Subscription::where('cat_id', 'Basic')->get('id');
    //     $basicNum = count($data);

    //     $data = Subscription::where('cat_id', 'SEO')->get('id');
    //     $seoNum = count($data);

    //     $data = Subscription::where('cat_id', 'Digital Marketing')->get('id');
    //     $digitalMarketingNum = count($data);

    //     // dd($num);
    //     $subscription_info = Subscription::orderBy('id', 'ASC')->where('status', 'Active')->get();
    //     return view('front.home.userHome')->with([
    //         'package_info' => $package_info,
    //         'basicNum'=> $basicNum,
    //         'trainingNum'=> $trainingNum,
    //         'seoNum'=> $seoNum,
    //         'digitalMarketingNum'=> $digitalMarketingNum

    //         // 'subscription_info' => $subscription_info
    //     ]);
    // }
}
