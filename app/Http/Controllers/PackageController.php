<?php

namespace App\Http\Controllers;
use App\Models\Package;
use App\Models\PackageCategories;
use Illuminate\Http\Request;

class PackageController extends Controller
{

    protected $package = null;

    public function __construct(Package $package)
    {
        $this->package = $package;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->package = $this->package->orderBy('id', 'DESC')->get();
        return view('admin.packages.package.packageList')->with('package_data' , $this->package);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat_info = PackageCategories::orderBy('id', 'Desc')->pluck('title', 'id');
        return view('admin.packages.package.packageForm')->with('cat_info', $cat_info);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $this->package->getRules();
        $request->validate($rules);
        $data = $request->except(['_token']);
        $this->package->fill($data);
        
        $status = $this->package->save();
        if($status){
            notify()->success('Package added successfully');
        }else{
            notify()->error('Sorry! There was problem in adding package');
        }
        
        return redirect()->route('package.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->package = $this->package->find($id);
        $cat_info = PackageCategories::orderBy('id', 'Desc')->pluck('title', 'id');
        if (!$this->package) {
            //message
            notify()->error('This package doesnot exists');
            return redirect()->route('package.index');
        }
        return view('admin.packages.package.packageView')
            ->with('package_data', $this->package)->with('cat_info', $cat_info);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->package = $this->package->find($id);
        $cat_info = PackageCategories::orderBy('id', 'Desc')->pluck('title', 'id');
        if (!$this->package) {
            //message
            notify()->error('This package doesnot exists');
            return redirect()->route('package.index');
        }
        return view('admin.packages.package.packageForm')
            ->with('package_data', $this->package)->with('cat_info', $cat_info);
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
        $this->package = $this->package->find($id);
        $cat_info = PackageCategories::orderBy('id', 'Desc')->pluck('title', 'id');
        if (!$this->package) {
            notify()->error('This package doesnot exists');
            redirect()->route('package.index');
        }
        
        $rules = $this->package->getRules();
        $request->validate($rules);
        $data = $request->except(['_token']);

        $this->package->fill($data);

        $status = $this->package->save();
        if($status){
            notify()->success('Package updated successfully');
        }else{
            notify()->error('Sorry! There was problem in updating package');
        }

        return redirect()->route('package.index')->with('cat_info', $cat_info);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->package = $this->package->find($id);
        if (!$this->package) {
            notify()->error('This package doesnot exists');
            redirect()->route('package.index');
        }
        $del = $this->package->delete();
        if ($del){
            notify()->success('Package deleted successfully');
        } else {
            notify()->error('There was problem in deleting package');
        }
        return redirect()->route('package.index');
    }
}
