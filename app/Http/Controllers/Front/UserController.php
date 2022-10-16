<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $user = null;
    

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getUserData()
    {
        if (!auth()->user()) {
            return redirect('/login');
        }
        $user_data = User::orderBy('id', 'Desc')->where('role', 'customer')->get();
        return view('front.user.userDetail')->with([
            'user_data' => $user_data
        ]);
    }

        // public function store(Request $request)
        // {
        //     $rules = $this->user->getRules();
        //     $request->validate($rules);
        //     $data = $request->except(['_token', 'photo']);
        //     if ($request->has('photo')) {
        //         $photo = $request->photo;
        //         $file_name = uploadImage($photo, 'user', '125x125');
        //         if ($file_name) {
        //             $data['photo'] = $file_name;
        //         }
        //     }

        //     $data['password'] = Hash::make($data['password']);
        //     $this->user->fill($data);
        //     $status = $this->user->save();
        //     if($status){
        //         notify()->success('User added successfully');
        //     }else{
        //         notify()->error('Sorry! There was problem while adding user');
        //     }
        //     return redirect()->route('front.user.getUserData');
        // }

        // public function update(Request $request, $id)
        // {
        //     $this->user = $this->user->find($id);
        //     if (!$this->user) {
        //         notify()->error('This user doesnot exists');
        //         redirect()->route('user.getUserData');
        //     }

        //     $rules = $this->user->getRules('update');
        //     $request->validate($rules);
        //     $data = $request->except(['_token', 'photo']);
        //     if ($request->has('photo')) {
        //         $photo = $request->photo;
        //         $file_name = uploadImage($photo, 'user', '125x125');
        //         if ($file_name) {
        //             if ($this->user->photo != null && file_exists(public_path() . '/uploads/user/' . $this->user->photo)) {
        //                 unlink(public_path() . '/uploads/user/' . $this->user->photo);
        //                 unlink(public_path() . '/uploads/user/Thumb-' . $this->user->photo);
        //             }
        //             $data['photo'] = $file_name;
        //         }
        //     }

        //     if ($data['password'] != $request->password) {

        //         $data['password'] = Hash::make($request->password);
        //     }

        //     $this->user->fill($data);

        //     $status = $this->user->save();
        //     if($status){
        //         notify()->success('User updated successfully');
        //     }else{
        //         notify()->error('Sorry! There was problem in updating user');
        //     }
        //     return redirect()->route('front.user.getUserData');
        // }
}
