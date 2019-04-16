<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\admin\permission;
use App\Model\admin\role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
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
        if (Gate::allows('admins.superAdmin', Auth::user())) {
            $roles = role::all();
          return view('admin.role.show',compact('roles'));  
        }else{
            return view('includes.404');
        }
          
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::allows('admins.superAdmin', Auth::user())) {
            $permissions = permission::all();
                    return view('admin.role.role',compact('permissions'));
        }else{
            return view('includes.404');
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
        $this->validate($request,['name'=>'required|max:20|unique:roles']);
        $role =  new role;

        $role->name = $request->name;

        $role->save();

        $role->permissions()->sync($request->permission);
        return redirect(route('role.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model\admin\role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\admin\role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::allows('admins.superAdmin', Auth::user())) {
            $permissions = permission::all();
            $role = role::where('id',$id)->first();
            return view('admin.role.edit', compact('role', 'permissions'));    
        }else{
            return view('includes.404');
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\admin\role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,['name'=>'required|max:30']);
        $role = role::find($id);

        $role->name = $request->name;
        $role->permissions()->sync($request->permission);
        $role->save();
        return redirect(route('role.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\admin\role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::allows('admins.superAdmin', Auth::user())) {
           role::where('id',$id)->delete();
                   return redirect()->back();
        }else{
            return view('includes.404');
        }

        
    }
        }

