<?php

namespace App\Http\Controllers;
use App\Models\Package;
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
        return view('admin.packages.package.packageForm');
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
            // notify()->success('package added successfully');
        }else{
            // notify()->error('Sorry! There was problem in adding package');
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
        if (!$this->package) {
            //message
            // notify()->error('This package doesnot exists');
            return redirect()->route('package.index');
        }

        // $this->category = $this->category->orderBy('id', 'DESC')->pluck('title', 'id');
        return view('admin.packages.package.packageView')
            ->with('package_data', $this->package);
            // ->with('category_data', $this->category);
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
        if (!$this->package) {
            //message
            // notify()->error('This package doesnot exists');
            return redirect()->route('package.index');
        }

        // $this->category = $this->category->orderBy('id', 'DESC')->pluck('title', 'id');
        return view('admin.packages.package.packageForm')
            ->with('package_data', $this->package);
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
        $this->package = $this->package->find($id);
        if (!$this->package) {
            // notify()->error('This package doesnot exists');
            redirect()->route('package.index');
        }
        
        $rules = $this->package->getRules();
        $request->validate($rules);
        $data = $request->except(['_token']);

        $this->package->fill($data);

        $status = $this->package->save();
        // if($status){
        //     notify()->success('package updated successfully');
        // }else{
        //     notify()->error('Sorry! There was problem in updating package');
        // }

        return redirect()->route('package.index');
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
            // notify()->error('This package doesnot exists');
            redirect()->route('package.index');
        }
        $del = $this->package->delete();
        if ($del) {
            return redirect()->route('package.index');
        }
    }
}
