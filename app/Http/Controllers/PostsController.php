<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\post;
use App\Models\Tag;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Auth;
use Session;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = post::paginate(4);
        // $post = post::all();
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = category::all();
        $tags = Tag::all();
        if ($cat->count() > 0 ) {
            return view('admin.post.create', compact('cat', 'tags'));
        } else {
            Session::flash('success', 'You must have category before attemping create category');
            return redirect()->back();
        }
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'          => 'required|unique:posts|max:100|min:8',
            'image'          => 'required',
            'category_id'    => 'required',
            'content'        => 'required',
            'tags'        => 'required',
        ]);

        // slug insert 
        $str   = $request->title;
        $slug  = trim(preg_replace('/\s+/', '-', $str));

        // image insert
        $image = $request->image;
        $image_newName = time().$image->getClientOriginalName(); 
        $image->move('uploads/post', $image_newName);

        $post = Post::create([
            'title' => $request->title,
            'slug'  =>$slug,
            'image' => 'uploads/post/'.$image_newName,
            'category_id' => $request->category_id,
            'content' => $request->content,
            'user_id' => Auth::id(),
        ]);
        $post->tags()->attach($request->tags);

        Session::flash('success', 'Post Created Successfully');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat   = category::all();
        $post  = post::find($id);
        $tags  = Tag::all();

        return view('admin.post.edit', compact('cat', 'post', 'tags'));

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
        $posts = post::find($id);
        $this->validate($request, [
            'title'        => 'required|max:100|min:8',
            'category_id'  => 'required',
            'content'      => 'required',
        ]);
         // slug insert 
         $str   = $request->title;
         $slug  = trim(preg_replace('/\s+/', '-', $str));

        //image insert///
        if ($request->hasfile('image')) {
            $image = $request->image;
            $image_newName = time().$image->getClientOriginalName();
            $image->move('uploads/post',$image_newName); 

            $file_path = $posts->image;
            unlink($file_path);
            
            $posts->image = 'uploads/post/'.$image_newName;

        }
        // ei khane sob update hobe
        $posts->title = $request->title;
        $posts->slug = $slug;
        $posts->category_id = $request->category_id;
        $posts->content = $request->content;
        $posts->save();
        $posts->tags()->sync($request->tags);
        Session::flash('success', 'Post Update successfully');
        return redirect()->route('post');

        // Session::flash('success', 'Post Created Successfully');
        // return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = post::find($id);
        $post->delete();
        Session::flash('success', 'The post just was trashed');
        return redirect()->back();
    }

    // show Teashed page 
    public function trashed()
    {
        $posts = post::onlyTrashed()->get();
        return view('admin.post.trash', compact('posts'));
    }

    // Permanently Delete 
    public function kill($id)
    {
        $posts = post::withTrashed()->where('id', $id)->first();

        // Image File Delete From Project File Directory
        $file_path = $posts->image;
        unlink($file_path);

        // $posts->history()->forceDelete();
        $posts->forceDelete();
        Session::flash('success', 'The post Permanently Delete');
        return redirect()->back();
    }

    // Restore Post From Trashed 
    public function restore($id)
    {
        $posts = post::withTrashed()->where('id', $id);
        $posts->restore();
        Session::flash('success', 'Post Restore Successfuly');
        return redirect()->back();

    }
    
}
