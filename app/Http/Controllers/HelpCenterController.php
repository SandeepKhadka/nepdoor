<?php

namespace App\Http\Controllers;

use App\Models\HelpCenter;
use Illuminate\Http\Request;

class HelpCenterController extends Controller
{
    protected $helpCenter = null;
    public function __construct(HelpCenter $helpCenter)
    {
        $this->helpCenter = $helpCenter;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $helpCenters = HelpCenter::orderBy('order_id', 'ASC')->get();
        return view('admin.helpCenter.helpCenterList')->with('helpCenter_data', $helpCenters);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.helpCenter.helpCenterForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $this->helpCenter->getRules();
        $request->validate($rules);
        $data = $request->all();
        $order_id = $this->helpCenter->all();
        // dd($order_id);
        $data['order_id'] = getOrderId($order_id);
        $this->helpCenter->fill($data);
        $status = $this->helpCenter->save();
        if ($status) {
            notify()->success('Help added successfully.');
        } else {
            notify()->error('Sorry! There was problem while adding help.');
        }
        return redirect()->route('helpCenter.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->helpCenter = $this->helpCenter->find($id);
        if (!$this->helpCenter) {
            notify()->error('This help doesnot exists');
            return redirect()->route('helpCenter.index');
        }
        return view('admin.helpCenter.helpCenterView')->with('helpCenter_data', $this->helpCenter);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->helpCenter = $this->helpCenter->find($id);
        if (!$this->helpCenter) {
            notify()->error('This help doesnot exists');
            return redirect()->route('helpCenter.index');
        }
        return view('admin.helpCenter.helpCenterForm')->with('helpCenter_data', $this->helpCenter);
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
        $this->helpCenter = $this->helpCenter->find($id);
        if (!$this->helpCenter) {
            notify()->error('This help doesnot exists');
            return redirect()->route('helpCenter.index');
        }
        $rules = $this->helpCenter->getRules();
        $request->validate($rules);
        $data = $request->all();
        $this->helpCenter->fill($data);
        $status = $this->helpCenter->save();
        if($status){
            notify()->success('Help updated successfully.');
        }else{
            notify()->error('Sorry! There was problem while adding help.');
        }
        return redirect()->route('helpCenter.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->helpCenter = $this->helpCenter->find($id);
        if (!$this->helpCenter) {
            notify()->error('This help doesnot exists');
            redirect()->route('helpCenter.index');
        }
        $del = $this->helpCenter->delete();
        if ($del) {
            notify()->success('Help deleted successfully');
        }
        else {
            //message
            notify()->error('Sorry! there was problem in deleting help');
        }
        return redirect()->route('helpCenter.index');
    }
}
