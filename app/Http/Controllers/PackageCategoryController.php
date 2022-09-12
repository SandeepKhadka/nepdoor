<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PackageCategories;

class PackageCategoryController extends Controller
{
    protected $packageCategories = null;

    public function __construct(PackageCategories $packageCategories)
    {
        // $this->middleware('auth');
        $this->packageCategories = $packageCategories;  
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->packageCategories = $this->packageCategories->orderBy('id', 'DESC')->get();
        return view('admin.packages.category.categoryList')->with('packageCategories_data', $this->packageCategories);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.packages.category.categoryForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $this->packageCategories->getRules();
        $request->validate($rules);
        $data = $request->except(['_token']);
        $this->packageCategories->fill($data);

        $status = $this->packageCategories->save();
        if($status){
            notify()->success('Category added successfully');
        }else{
            notify()->error('Sorry! There was problem while adding category');
        }

        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->packageCategories = $this->packageCategories->find($id);
        if (!$this->packageCategories) {
            # code...
            notify()->error('This category doesnot exists');
            return redirect()->route('category.index');
        }
        return view('admin.packages.category.categoryView')->with('packageCategories_data', $this->packageCategories);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->packageCategories = $this->packageCategories->find($id);
        if (!$this->packageCategories) {
            # code...
            notify()->error('This category doesnot exists');
            return redirect()->route('category.index');
        }
        return view('admin.packages.category.categoryForm')->with('packageCategories_data', $this->packageCategories);
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
        $this->packageCategories = $this->packageCategories->find($id);
        if (!$this->packageCategories) {
            # code...
            notify()->error('This category doesnot exists');
            return redirect()->route('category.index');
        }
        $rules = $this->packageCategories->getRules();
        $request->validate($rules);
        $data = $request->except(['_token']);
        $this->packageCategories->fill($data);

        $status = $this->packageCategories->save();
        if($status){
            notify()->success('Category updated successfully');
        }else{
            notify()->error('Sorry! There was problem in adding category');
        }

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->packageCategories = $this->packageCategories->find($id);
        if (!$this->packageCategories) {
            # code...
            notify()->error('This category doesnot exists');
            return redirect()->route('category.index');
        }
        $del = $this->packageCategories->delete();
        if ($del) {
            notify()->success('Category deleted successfully');
        } else {
            notify()->error('There was problem in deleting category');
        }
        return redirect()->route('category.index');
    }
}
