<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Models\category;


// Ruhul

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = category::all();

        // $category = category::wherelile( 'admin' == '1');


        return view('admin.category.index')->with('category', $category);
        // $categorys = category::where( admin == '1');
        // echo $categorys;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.addcategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $category = new category;
        $this->validate($request, [
            'name' => 'required'
        ]); 
        if ($category->count() < 9) {
            $category->name = $request->name;
            $category->save();
            Session::flash('success', 'Category Add succesfully');
            return redirect()->route('AddCategory');
        }
        Session::flash('success', 'Category all collum fill');
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
    public function Active($id) 
    {
        $category = category::find($id);
        $category->admin = 1;
        $category->save();

        Session::flash('success', 'Succesfully Change Category Permission');
        return redirect()->back();
    }
    public function Deactive($id) 
    {
        $category = category::find($id);
        $category->admin = 0;
        $category->save();

        Session::flash('success', 'Succesfully Change Category Permission');
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
        $category = category::find($id);

        return view('admin.category.edit')->with('category', $category);
        
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
        $this->validate($request, [
            'name' => 'required'
        ]); 

        $category = category::find($id);
        $category->name = $request->name;
        $category->save();
        Session::flash('success', 'Category Updated Succesfully');
        return redirect()->route('category');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = category::find($id);
        $category->delete();
        Session::flash('warning', 'Category succesfully delete');
        return redirect()->route('category');
    }
}
