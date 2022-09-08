<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
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
        $this->user = $this->user->orderBy('id' , 'DESC')->get();
        return view('admin.user.userList')->with('user_data', $this->user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.userForm');
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

        $this->user->fill($data);
        $status = $this->user->save();
        // if($status){
        //     notify()->success('user added successfully');
        // }else{
        //     notify()->error('Sorry! There was problem in adding user');
        // }
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->user = $this->user->find($id);
        if (!$this->user) {
            //message
            // notify()->error('This user doesnot exists');
            return redirect()->route('user.index');
        }

        // $this->category = $this->category->orderBy('id', 'DESC')->pluck('title', 'id');
        return view('admin.user.userView')
            ->with('user_data', $this->user);
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
            // notify()->error('This user doesnot exists');
            return redirect()->route('user.index');
        }

        // $this->category = $this->category->orderBy('id', 'DESC')->pluck('title', 'id');
        return view('admin.user.userForm')
            ->with('user_data', $this->user);
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
        $this->user = $this->user->find($id);
        if (!$this->user) {
            // notify()->error('This user doesnot exists');
            redirect()->route('user.index');
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

        $this->user->fill($data);

        $status = $this->user->save();
        // if($status){
        //     notify()->success('user updated successfully');
        // }else{
        //     notify()->error('Sorry! There was problem in updating user');
        // }
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->user = $this->user->find($id);
        if (!$this->user) {
            // notify()->error('This user doesnot exists');
            redirect()->route('user.index');
        }

        $del = $this->user->delete();
        $photo = $this->user->photo;
        if ($del) {
            if ($photo != null && file_exists(public_path() . '/uploads/user/' . $photo)) {
                unlink(public_path() . '/uploads/user/' . $photo);
                unlink(public_path() . '/uploads/user/Thumb-' . $photo);
                //message
                // notify()->success('user deleted successfully');
            }
            else {
                //message
                // notify()->error('Sorry! there was problem in deleting data');
            }

            return redirect()->route('user.index');
        }
    }
}