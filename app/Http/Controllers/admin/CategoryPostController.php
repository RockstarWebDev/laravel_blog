<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\model\user\category_post;
use Illuminate\Http\Request;

class CategoryPostController extends Controller
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
     * @param  \App\model\user\category_post  $category_post
     * @return \Illuminate\Http\Response
     */
    public function show(category_post $category_post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\user\category_post  $category_post
     * @return \Illuminate\Http\Response
     */
    public function edit(category_post $category_post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\user\category_post  $category_post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category_post $category_post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\user\category_post  $category_post
     * @return \Illuminate\Http\Response
     */
    public function destroy(category_post $category_post)
    {
        //
    }
}
