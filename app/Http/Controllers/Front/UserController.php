<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $user = null;

    public function __construct(User $user)
    {
        // $this->middleware('auth');
        $this->user = $user;
    }

    public function getUserData()
    {
        if (!auth()->user()) {
            return redirect('/login');
        }
        // $user = $this->user->find($id); 
        // $subscription_data = User::orderBy('id', 'DESC')->where('user_id', auth()->user()->id)->get();
        $user_data = User::orderBy('id', 'Desc')->where('role', 'admin')->get();
        // $package_info = Package::orderBy('id', 'Desc')->with('cat_info')->where('status', 'Active')->get();
        return view('front.user.userDetail')->with([
            // 'subscription_data' => $subscription_data,
            'user_data' => $user_data
        ]);
    }
}
