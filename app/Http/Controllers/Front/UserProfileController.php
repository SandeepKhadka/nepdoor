<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{

    protected $user = null;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //     $this->user = $this->user->orderBy('id', 'DESC')->get();
        //     return view('front.user.userDetail')->with('user_data', $this->user);
        if (!auth()->user()) {
            return redirect('/login');
        }
        // $user_data = User::get()->where('id', auth()->user()->id);
        // dd($user_data);
        return view('front.user.userDetail');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $this->user->getRules();
        $request->validate($rules);
        $data = $request->except(['_token', 'photo']);
        if ($request->has('photo')) {
            $photo = $request->photo;
            $file_name = uploadImage($photo, 'user', '125x125');
            if ($file_name) {
                $data['photo'] = $file_name;
            }
        }

        $data['password'] = Hash::make($data['password']);
        $this->user->fill($data);
        $status = $this->user->save();
        if ($status) {
            notify()->success('User added successfully');
        } else {
            notify()->error('Sorry! There was problem while adding user');
        }
        return redirect()->route('profile.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->user = $this->user->find($id);
        if (!$this->user) {
            //message
            notify()->error('This user doesnot exists');
            return redirect()->route('profile.index');
        }
        return view('front.user.userDetail')
            ->with('user_data', $this->user);
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
        $this->user = $this->user->find($id);
        if (!$this->user) {
            notify()->error('This user doesnot exists');
            redirect()->route('profile.index');
        }

        $rules = $this->user->getRules('update');
        $request->validate($rules);
        $data = $request->except(['_token', 'photo']);
        if ($request->has('photo')) {
            $photo = $request->photo;
            $file_name = uploadImage($photo, 'user', '125x125');
            if ($file_name) {
                if ($this->user->photo != null && file_exists(public_path() . '/uploads/user/' . $this->user->photo)) {
                    unlink(public_path() . '/uploads/user/' . $this->user->photo);
                    unlink(public_path() . '/uploads/user/Thumb-' . $this->user->photo);
                }
                $data['photo'] = $file_name;
            }
        }

        if (isset($request->oldPassword) && $request->oldPassword != null) {
            if ($data['password'] != $request->oldPassword) {
                notify()->error("Your provided password did not match.");
                return redirect()->back();
            }
        }

        if ($request->newPassword == $request->retypeNewPassword) {
            $data['password'] = Hash::make($request->newPassword);
        } else {
            notify()->error("Password did not match.");
            return redirect()->route('profile.index');
        }

        $this->user->fill($data);

        $status = $this->user->save();
        if ($status) {
            notify()->success('User updated successfully');
        } else {
            notify()->error('Sorry! There was problem in updating user');
        }
        return redirect()->route('profile.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
