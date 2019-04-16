<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostValidation;
use App\Model\admin\admin;
use App\Model\user\category;
use App\Model\user\post;
use App\Model\user\tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth:admin'); 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        $posts = post::all();
        return view('admin.post.show',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->can('posts.create')){

        $categories = category::all();
        $tags = tag::all();
         return view('admin.post.post',compact('categories','tags'));
        }

        return redirect(route('admin.index'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostValidation $request)
    {

        if ($request->hasFile('image')) {
            $request->image->store('public');
            $image_name = $request->file('image')->hashName();
        }else{
            return 'No';
        }
        
        $post = new post;
        
        $post->image = $image_name;
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->slug = $request->slug;
        $post->body = $request->body;
        $post->status = $request->status;

        $post->save();

        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);
        return redirect(route('post.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model\admin\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\admin\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->can('posts.update')){

      $categories = category::all();
      $tags = tag::all();
      $post = post::where('id',$id)->first();
      return view('admin.post.edit',compact('post','categories','tags'));   
        }

        return redirect(route('admin.index'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\admin\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(PostValidation $request, $id)
    {
        if ($request->hasFile('image')) {
            $request->image->store('public');
            $image_name = $request->file('image')->hashName();
        }

        $post = post::find($id);

        $post->image =  $image_name;
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->slug = $request->slug;
        $post->body = $request->body;
        $post->status = $request->status;

        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);

        $post->save();
        return redirect(route('post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\admin\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        if (Auth::user()->can('posts.delete')){

        post::where('id',$id)->delete();
        return redirect()->back();
        }

        return redirect(route('post.index'));
    }
}
