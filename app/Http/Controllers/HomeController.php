<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\PackageCategories;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('auth');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    

    public function index()
    {
        return redirect()->route(request()->user()->role);
    }

    public function admin()
    {
        return redirect()->route('adminHome');
    }

    public function customer()
    {
        $package_info = Package::orderBy('id', 'ASC')->where('status', 'Active')->get();
        $category_info = PackageCategories::orderBy('id', 'DESC')->where('status', 'Active')->get();
        return view('index')->with([
            'package_info' => $package_info,
            'category_info' => $category_info
        ]);
    }
}
