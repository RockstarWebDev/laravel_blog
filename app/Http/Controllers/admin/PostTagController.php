<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\model\user\post_tag;
use Illuminate\Http\Request;

class PostTagController extends Controller
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
        //
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
     * @param  \App\model\user\post_tag  $post_tag
     * @return \Illuminate\Http\Response
     */
    public function show(post_tag $post_tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\user\post_tag  $post_tag
     * @return \Illuminate\Http\Response
     */
    public function edit(post_tag $post_tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\user\post_tag  $post_tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post_tag $post_tag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\user\post_tag  $post_tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(post_tag $post_tag)
    {
        //
    }
}
