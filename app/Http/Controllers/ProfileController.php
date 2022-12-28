<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Session;
use Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.profile.index');
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
        //
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
    public function edit()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('admin.profile.edit', compact('user'));
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
        $user = User::find($id); 

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users'
        ]);

        //image insert///
        if ($request->hasfile('image')) {

            // $file_path = $user->profile_photo_path;
            // if($file_path) {
            //     unlink($file_path);
            // }
 
            $image = $request->image;
            $image_newName = time().$image->getClientOriginalName();
            $image->move('uploads/users',$image_newName); 

            // $file_path = $user->profile_photo_path;
            // unlink($file_path);

            $user->profile_photo_path = 'uploads/users/'.$image_newName;
        }
        //user table data insert///
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        //profile table data insert///
        $user->profile->phone = $request->phone;
        $user->profile->mobile = $request->mobile;
        $user->profile->address = $request->address;
        $user->profile->about = $request->about;
        $user->profile->facebook = $request->facebook;
        $user->profile->youtube = $request->youtube;
        $user->profile->save();


        Session::flash('success', 'User Update Successfully');
        return redirect()->back();
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
