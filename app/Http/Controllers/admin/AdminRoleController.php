<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\admin\admin_role;
use Illuminate\Http\Request;

class AdminRoleController extends Controller
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
     * @param  \App\model\admin\admin_role  $admin_role
     * @return \Illuminate\Http\Response
     */
    public function show(admin_role $admin_role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\admin\admin_role  $admin_role
     * @return \Illuminate\Http\Response
     */
    public function edit(admin_role $admin_role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\admin\admin_role  $admin_role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, admin_role $admin_role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\admin\admin_role  $admin_role
     * @return \Illuminate\Http\Response
     */
    public function destroy(admin_role $admin_role)
    {
        //
    }
}
