<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Comment;
use App\Models\post;
use App\Models\Setting;
use App\Models\Subscriber;
use App\Models\Tag;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // ==============>>>index<<<==============
    public function index()
    {
        $subscribers = Subscriber::all();
        // $title = Setting::first()->site_name;
        $setting = Setting::first();
        $categorys = category::all();
        $allcat = category::all();
        // $cats = category::where('admin' , '1');

        $categorys = category::take(5)->get();

        $lates_post = post::orderBy('created_at', 'desc')->first();
        $second_lates_post = post::orderBy('created_at', 'desc')->skip(1)->first();
        $third_lates_post = post::orderBy('created_at', 'desc')->skip(2)->first();
        $sec_one = category::find(4);
        $sec_two = category::find(3);
        $sec_three = category::find(2);

        return view('vendor.index', compact('setting', 'categorys', 'lates_post', 'second_lates_post', 'third_lates_post', 'sec_one', 'sec_two', 'sec_three', 'subscribers', 'categorys'));
    }
   // ==============>>>details<<<==============
    public function details($id, $slug)
    {
        $subscribers = Subscriber::all();
        $setting = Setting::first();
        $categorys = category::take(5)->get();
        $post = post::find($id);
        $tags = Tag::all();

        $next_id = post::where('id', '>', $post->id )->min('id');
        $next_post = post::find($next_id);

        $previous_id = post::where('id', '<', $post->id )->max('id');
        $previous_post = post::find($previous_id);

        // post views 
        $views = $post->view;
        $post->view = $views+1;
        $post->save(); 

        // post comment 
        $comments = Comment::all();

        return view('vendor.details', compact('setting', 'categorys', 'post', 'tags', 'next_post', 'previous_post', 'subscribers', 'comments'));
    }

    // ==============>>>singleCategory<<<==============
    public function singleCategory($id)
    {
        $subscribers = Subscriber::all();
        $setting = Setting::first();
        $categorys = category::take(5)->get();
        $category = category::find($id);
        $tags = Tag::all();

        return view('vendor.singleCategory', compact('setting', 'categorys', 'category', 'tags', 'subscribers'));
    }

    // ==============>>>searchPost<<<==============
    public function searchPost(Request $request)
    {
        $setting = Setting::first();
        $categorys = category::take(5)->get();
        $tags = Tag::all();

        $search = request('query');
        $posts = post::where('title', 'like','%'.$search.'%')->get();

        return view('vendor.search', compact('setting', 'categorys', 'posts', 'tags', 'search', 'subscribers'));
        
    }
    // ==============>>>singleTag<<<==============
    public function singleTag($id)
    {
        $subscribers = Subscriber::all();
        // echo $id;
        $setting = Setting::first();
        $categorys = category::take(5)->get();
        $tag = Tag::find($id);
        $tags = Tag::all();

        return view('vendor.singleTag', compact('setting', 'categorys', 'tag', 'tags', 'subscribers'));
    }
   



    

}
