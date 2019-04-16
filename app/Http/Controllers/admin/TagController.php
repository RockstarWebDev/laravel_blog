<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryValidation;
use App\Model\user\tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller
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
        if (Auth::user()->can('posts.tag')) {
          
        $tags = tag::all();
        return view('admin.tag.show',compact('tags'));
        }

        return redirect(route('admin.index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->can('posts.tag')) {
            # code...
        return view('admin.tag.tag');
        }
        return redirect(route('admin.index'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryValidation $request)
    {
        $tag = new tag;
        $tag->name = $request->title;
        $tag->slug = $request->slug;

        $tag->save();
        return redirect(route('tag.index')); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model\user\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\user\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->can('posts.tag')) {
            # code...
        $tag = tag::where('id',$id)->first();
        return view('admin.tag.edit', compact('tag'));
        }
        return redirect(route('home.index'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\user\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryValidation $request, $id)
    {
        $tag = tag::find($id);

        $tag->name = $request->title;
        $tag->slug = $request->slug;

        $tag->save();
        return redirect(route('tag.index'));  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\user\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->can('posts.tag')) {
            # code...
        tag::where('id',$id)->delete();
        return redirect()->back(); 
        }
        return redirect(route('admin.index'));

    }
}
