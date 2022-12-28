<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use phpDocumentor\Reflection\Types\This;
use Session;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('Admin');
    }


    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate([
        //     'name'  => 'required'
        // ]);
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            // 'password' => 'required',
            // 'confirmPassword' => 'required',
        ]);
        $users = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('password')
        ]);

        // Profile::create([
        //     'user_id' => $users->id
        // ]);
         
        $profile = new Profile;
        $profile->user_id = $users->id;
        $profile->save();




        Session::flash('success', 'User Add succesfully');
        return redirect()->back();
        
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function MakeAdmin($id) 
    {
        $user = User::find($id);
        $user->admin = 1;
        $user->save();

        Session::flash('success', 'Succesfully Change Uesr Permission');
        return redirect()->back();
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function RemoveAdmin($id)
    {
        $user = User::find($id);
        $user->admin = 0;
        $user->save();

        Session::flash('success', 'Succesfully Change Uesr Permission');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        $user->profile->delete();

        Session::flash('warning', 'Uesr destroy Succesfully');
        return redirect()->back();
    }
}
