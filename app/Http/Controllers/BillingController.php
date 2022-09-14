<?php

namespace App\Http\Controllers;

use App\Models\Billing;
use Illuminate\Http\Request;

class BillingController extends Controller
{

    protected $billing = null;

    public function __construct(Billing $billing)
    {
        $this->billing = $billing;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->billing = $this->billing->orderBy('id', 'DESC')->get();
        return view('admin.billing.billingList')->with('billing_data' , $this->billing);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.billing.billingForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $rules = $this->billing->getRules();
        $request->validate($rules);
        $data = $request->except(['_token', 'voucher']);
        if ($request->has('voucher')) {
            $voucher = $request->voucher;
            $file_name = uploadImage($voucher, 'billing', '125x125');
            if ($file_name) {
                $data['voucher'] = $file_name;
            }
        }

        $data['billNo'] = 'bil-' . rand(0, 99) . '-' . $this->billing->id;
        $this->billing->fill($data);

        $status = $this->billing->save();
        if($status){
            notify()->success('Bill added successfully.');
        }else{
            notify()->error('Sorry! There was problem while adding bill.');
        }

        return redirect()->route('billing.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->billing = $this->billing->find($id);
        if (!$this->billing) {
            notify()->error('This bill doesnot exists');
            return redirect()->route('billing.index');
        }
        return view('admin.billing.billingView')
            ->with('billing_data', $this->billing);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->billing = $this->billing->find($id);
        if (!$this->billing) {
            //message
            notify()->error('This bill doesnot exists');
            return redirect()->route('billing.index');
        }

        return view('admin.billing.billingForm')
            ->with('billing_data', $this->billing);
            // ->with('category_data', $this->category);
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
        $this->billing = $this->billing->find($id);
        if (!$this->billing) {
            notify()->error('This billing doesnot exists');
            redirect()->route('billing.index');
        }

        $rules = $this->billing->getRules('update');
        $request->validate($rules);
        $data = $request->except(['_token', 'voucher']);
        if ($request->has('voucher')) {
            $voucher = $request->voucher;
            $file_name = uploadImage($voucher, 'billing', '125x125');
            if ($file_name) {
                if ($this->billing->voucher != null && file_exists(public_path() . '/uploads/billing/' . $this->billing->voucher)) {
                    unlink(public_path() . '/uploads/billing/' . $this->billing->voucher);
                    unlink(public_path() . '/uploads/billing/Thumb-' . $this->billing->voucher);
                }
                $data['voucher'] = $file_name;
            }
        }

        $this->billing->fill($data);

        $status = $this->billing->save();
        if($status){
            notify()->success('Bill updated successfully.');
        }else{
            notify()->error('Sorry! There was problem while adding bill.');
        }
        return redirect()->route('billing.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->billing = $this->billing->find($id);
        if (!$this->billing) {
            notify()->error('This bill doesnot exists');
            redirect()->route('billing.index');
        }

        $del = $this->billing->delete();
        $voucher = $this->billing->voucher;
        if ($del) {
            if ($voucher != null && file_exists(public_path() . '/uploads/billing/' . $voucher)) {
                unlink(public_path() . '/uploads/billing/' . $voucher);
                unlink(public_path() . '/uploads/billing/Thumb-' . $voucher);
                //message
                notify()->success('Bill deleted successfully');
            }
            else {
                //message
                notify()->error('Sorry! there was problem in deleting bill');
            }

            return redirect()->route('billing.index');
        }
    }
}
