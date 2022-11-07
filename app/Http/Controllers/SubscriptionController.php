<?php

namespace App\Http\Controllers;

use App\Models\Billing;
use App\Models\Package;
use App\Models\Subscription;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    protected $subscription = null;

    public function __construct(Subscription $subscription, Billing $billing)
    {
        // $this->middleware('auth');
        $this->subscription = $subscription;
        $this->billing = $billing;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->subscription = $this->subscription->orderBy('id', 'DESC')->get();
        // $this->billing = $this->billing->orderBy('id', 'DESC')->get(['billNo', 'id', 'payment_status']);
        $user_info = User::orderBy('id', 'Desc')->where('role', 'customer')->pluck('full_name', 'id');
        $package_info = Package::orderBy('id', 'Desc')->pluck('name', 'id');
        return view('admin.subscription.subscriptionList')->with('subscription_data', $this->subscription)->with('billing_data', $this->billing)->with('user_info', $user_info)->with('package_info', $package_info);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_info = User::orderBy('id', 'Desc')->where('role', 'customer')->pluck('full_name', 'id');
        $package_info = Package::orderBy('id', 'Desc')->pluck('name', 'id');
        return view('admin.subscription.subscriptionForm')->with('user_info', $user_info)->with('package_info', $package_info);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $this->subscription->getRules();
        $request->validate($rules);
        $data = $request->except(['_token']);
        $endDate = Carbon::parse($this->subscription->start_date)->addDays(30);
        $data['end_date'] = $endDate;
        $data['billing_id'] = 'bil-' . rand(0, 99);
        $this->subscription->fill($data);

        $status = $this->subscription->save();
        if ($status) {
            notify()->success('Subscription added successfully.');
        } else {
            notify()->error('Sorry! There was problem in adding subscription.');
        }

        return redirect()->route('subscription.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->subscription = $this->subscription->find($id); 
        $bill_no = $this->subscription->billing_id;
        $this->billing = $this->billing->orderBy('id', 'DESC')->firstWhere('billNo', $bill_no);
        // dd($this->billing);
        // $this->billing = $this->billing->find($id);
        $user_info = User::orderBy('id', 'Desc')->where('role', 'customer')->pluck('full_name', 'id');
        $package_info = Package::orderBy('id', 'Desc')->pluck('name', 'id');
        if (!$this->subscription) {
            # code...
            notify()->error('This subscription doesnot exists');
            return redirect()->route('subscription.index');
        }
        return view('admin.subscription.subscriptionView')->with('subscription_data', $this->subscription)->with('billing_data', $this->billing)->with('user_info', $user_info)->with('package_info', $package_info);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->subscription = $this->subscription->find($id);
        $bill_no = $this->subscription->billing_id;
        $this->billing = $this->billing->orderBy('id', 'DESC')->firstWhere('billNo', $bill_no);
        $user_info = User::orderBy('id', 'Desc')->where('role', 'customer')->pluck('full_name', 'id');
        $package_info = Package::orderBy('id', 'Desc')->pluck('name', 'id');
        if (!$this->subscription) {
            notify()->error('This subscription doesnot exists');
            return redirect()->route('subscription.index');
        }
        return view('admin.subscription.subscriptionForm')->with('subscription_data', $this->subscription)->with('billing_data', $this->billing)->with('user_info', $user_info)->with('package_info', $package_info);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->subscription = $this->subscription->find($id);
        // $bill_no = $this->subscription->billing_id;
        // $this->billing = $this->billing->orderBy('id', 'DESC')->firstWhere('billNo', $bill_no);
        $user_info = User::orderBy('id', 'Desc')->where('role', 'customer')->pluck('full_name', 'id');
        $package_info = Package::orderBy('id', 'Desc')->pluck('name', 'id');
        if (!$this->subscription) {
            # code...
            notify()->error('This subscription doesnot exists');
            return redirect()->route('subscription.index');
        }
        $rules = $this->subscription->getRules();
        $request->validate($rules);
        $data = $request->except(['_token']);
        $endDate = Carbon::parse($request->start_date)->addDays(30);
        $data['end_date'] = $endDate;
        $this->subscription->fill($data);

        $status = $this->subscription->save();
        if ($status) {
            notify()->success('Subscription updated successfully');
        } else {
            notify()->error('Sorry! There was problem in adding subscription');
        }

        return redirect()->route('subscription.index')->with('billing_data', $this->billing)->with('user_info', $user_info)->with('package_info', $package_info);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->subscription = $this->subscription->find($id);
        if (!$this->subscription) {
            # code...
            notify()->error('This subscription doesnot exists');
            return redirect()->route('subscription.index');
        }
        $del = $this->subscription->delete();
        if ($del) {
            notify()->success('Subscription deleted successfully');
        } else {
            notify()->error('There was problem in deleting subscription');
        }
        return redirect()->route('subscription.index');
    }
}
