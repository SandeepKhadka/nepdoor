<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        if (!auth()->user()) {
            return redirect('/login');
        }
        return view('layouts.admin');
    }

    public function customer()
    {
        if (!auth()->user()) {
            return redirect('/login');
        }
        return view('index');
    }
}
