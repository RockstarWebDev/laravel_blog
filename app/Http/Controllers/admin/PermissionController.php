<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\admin\permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PermissionController extends Controller
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
            
        $permissions = permission::all();
        return view('admin.permission.show',compact('permissions'));
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
        
        return view('admin.permission.permission');
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
        $this->validate($request, ['name'=>'required|string|max:55', 'for'=>'required']);
        $permission = new permission;

        $permission->name = $request->name;
        $permission->for = $request->for;

        $permission->save();
        return redirect(route('permission.index'))->with('message','Permission created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model\admin\permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\admin\permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::allows('admins.superAdmin', Auth::user())) {
            
        $permission = permission::where('id',$id)->first();
        return view('admin.permission.edit', compact('permission'));
        }else{
            return view('includes.404');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\admin\permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request, ['name'=>'required|string|max:55']);
        $permission = permission::find($id);

        $permission->name = $request->name;
     

        $permission->save();
        return redirect(route('permission.index'))->with('message','Permission updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\admin\permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::allows('admins.superAdmin', Auth::user())) {
            
        permission::where('id',$id)->delete();
        return redirect()->back();
        }else{
            return view('includes.404');
        }
    }
}
