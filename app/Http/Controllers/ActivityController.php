<?php

namespace App\Http\Controllers;
use App\Models\Activity;
use App\Models\User;
use Illuminate\Http\Request;

class ActivityController extends Controller
{

    protected $activity = null;
    public function __construct(Activity $activity)
    {
       // $this->middleware('auth');
       $this->activity = $activity;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activity::orderBy('id')->get();
        return view('admin.activity.activityList')->with('activity_data',$activities);
        // $this->package = $this->package->where('status' , 'Active')->get();
        // return view('admin.packages.package.packageList')->with('package_data' , $this->package);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_info = User::orderBy('id', 'Desc')->where('role', 'customer')->pluck('full_name', 'id');
        return view('admin.activity.activityForm')->with('user_info', $user_info);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $this->activity->getRules();
        $request->validate($rules);
        $data = $request->all();
        $this->activity->fill($data);
        $status = $this->activity->save();
        return redirect()->route('activity.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     $this->activity= $this->activit->find($id);
     $user_info = User::orderBy('id', 'Desc')->where('role', 'customer')->pluck('full_name', 'id');
        if (!$this->activity) {
            return redirect()->route('activity.index');
        }
        return view('admin.activity.activityView')->with('activity_data', $this->activity)->with('user_info', $user_info);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    $this->activity= $this->activity->find($id);
    $user_info = User::orderBy('id', 'Desc')->where('role', 'customer')->pluck('full_name', 'id');
     if (!$this->activity) {
            return redirect()->route('activity.index');
        }

        return view('admin.activity.activityForm')->with('activity_data', $this->activity)->with('user_info', $user_info);
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
    $this->activity= $this->activity->find($id);
    $user_info = User::orderBy('id', 'Desc')->where('role', 'customer')->pluck('full_name', 'id');
    if (!$this->activity) {

        return redirect()->route('activity.index');
        }
        $rules = $this->activity->getRules();
        $request->validate($rules);
        $data = $request->all();
        $this->activity->fill($data);
        $status = $this->activity->save();
        return redirect()->route('activity.index')->with('user_info', $user_info);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $this->activity = $this->activity->find($id);
    $del = $this->activity->delete();
    return redirect()->route('activity.index');
    }
}