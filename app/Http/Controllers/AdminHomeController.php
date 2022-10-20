<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\PackageCategories;
use App\Models\Subscription;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function getHomeData()
    {
        // $package_data = Package::orderBy('id', 'ASC')->with('cat_info')->where('status', 'Active')->get('name');
        // dd($package_data);
        // $unique_package = array_count_values($package_data);
        // $standard_package == Package::orderBy('id', 'ASC')->with('cat_info')->where('status', 'Active')->get('name');
        // foreach($package_data as $package){
        //     $package_collection[] = $package->name;
        //     // $package_collection = array_count_values($package);
        // }
        // // dd($package_collection);
        // $unique_package = array_count_values($package_collection);

        // dd($unique_package);
        // foreach($unique_package as $package){
        //     dd($package);
        // }


        // $Subscription_info = Subscription::orderBy('id', 'ASC')->with('package_info')->where('status', 'Active')->get();

        //basic
        // $seoBasicdata = Subscription::where('cat_id', 'Basic')->get('id');
        // $basicSEONum = count($seoBasicdata);

        // $digitalBasicdata = Subscription::where('cat_id', 'Basic')->get('id');
        // $basicDigitalMarketingNum = count($digitalBasicdata);

        //for seo
        // $data = Subscription::where('cat_id', 'SEO')->with('package_info')->where('status', 'Active')->get('id');
        // $seoStandardNum = count($data);

        // $data = Subscription::where('cat_id', 'SEO')->with('package_info')->where('status', 'Active')->get('id');
        // $seoPremiumNum = count($data);

        // $data = Subscription::where('cat_id', 'SEO')->with('package_info')->where('status', 'Active')->get('id');
        // $seoEnterpriseNum = count($data);

        //for digital marketing
        // $digitalMarketingInfo = Subscription::where('cat_id', 'Digital Marketing')->with('package_info')->where('status', 'Active')->get();
        // foreach ($digitalMarketingInfo as $digitalMarketingInfo) {
        //     $digitalMarketingPackages[] = $digitalMarketingInfo->package_info['name'];
        //     // $package_collection = array_count_values($package);
        // }
        // $unique_digitalMarketingPackage = array_count_values($digitalMarketingPackages);


        // dd($unique_digitalMarketingPackage);
        // dd($digitalMarketingInfo);
        // $digitalMarketingStandardNum = 0;
        // $digitalMarketingPackages = 0;
        // foreach($digitalMarketingInfo as $digitalMarketing){
        //     // foreach($package_data as $package)
        //     // dd($package_data);
        //     if((isset($digitalMarketing->package_info['name']))){
        //         foreach($unique_package as $package_name => $package_number){
        //             if($package_name == $digitalMarketing->package_info['name']){

        //             }
        //         }
        //         // $digitalMarketingPackages += 1;
        //     }
        // elseif(isset($digitalMarketing->package_info['name']) && $digitalMarketing->package_info['name']=='Premium Package'){
        //     $digitalMarketingPremiumNum += 1;
        // }
        // }
        // dd($digitalMarketingPackages );
        // $digitalMarketingStandardNum = count($data);


        // $data = Subscription::where('cat_id', 'Digital Marketing')->with('package_info')->where('status', 'Active')->get('id');
        // $digitalMarketingPremiumNum = count($data);


        // $data = Subscription::where('cat_id', 'Digital Marketing')->with('package_info')->where('status', 'Active')->get('id');
        // $digitalMarketingEnterpriseNum = count($data);


        //training
        // $data = Subscription::where('cat_id', 'Training')->with('package_info')->where('status', 'Active')->get('id');
        // $trainingDigitalMarketingNum = count($data);

        // $data = Subscription::where('cat_id', 'Training')->with('package_info')->where('status', 'Active')->get('id');
        // $trainingSEONum = count($data);


        $subscription_info = Subscription::orderBy('id', 'ASC')->with('package_info')->where('status', 'Active')->get();
        $subscriptionCategory = [];
        foreach ($subscription_info as $subscription) {
            // dd($subscription);

            if (isset($subscription) && $subscription->cat_id != null) {
                $subscriptionCategory[] = $subscription->cat_id;
            }
            // $package_collection = array_count_values($package);
        }
        // if (isset($subscriptionCategory)) {

            $unique_subscriptionCategory = array_count_values($subscriptionCategory);
        // }
        // dd($unique_subscriptionPackages);
        // foreach ($unique_subscriptionCategory as $category_name => $category_number) {
        //     if ($category_name != null) {
        //         foreach ($subscription_info as $subscription) {
        //             $subscriptionPackage[] = $subscription->package_info['name'];
        //         }
        //     }
        // }
        // dd($subscriptionPackage);
        // return view('admin.Home.adminHome')->with([
        //     'subscription_info' => $subscription_info,
        //     'seoStandardNum'=> $seoStandardNum,
        //     'seoPremiumNum'=> $seoPremiumNum,
        //     'seoEnterpriseNum'=> $seoEnterpriseNum,
        //     // 'digitalMarketingStandardNum'=> $digitalMarketingStandardNum,
        //     // 'digitalMarketingPremiumNum'=> $digitalMarketingPremiumNum,
        //     // 'digitalMarketingEnterpriseNum'=> $digitalMarketingEnterpriseNum,
        //     'trainingSEONum'=>$trainingSEONum,
        //     'trainingDigitalMarketingNum'=>$trainingDigitalMarketingNum

        //     // 'subscription_info' => $subscription_info
        // ]);

        return view('admin.Home.adminHome')->with([
            'subscription_info' => $subscription_info,
            // 'digitalMarketingPackages' => $unique_digitalMarketingPackage
            'subscriptionCategory' => $unique_subscriptionCategory
        ]);
    }
}
