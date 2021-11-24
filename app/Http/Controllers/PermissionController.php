<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PermissionComponent;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\Gate;
use Session;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(! Gate::allows('permission-view')){
            return abort(401);
        }
        return view('admin.permissions.index')->with('permissions', Permission::all())
                                                ->with('p_components', PermissionComponent::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permissions.create')->with('p_components', PermissionComponent::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $permission = str_slug($request->permission);
        Permission::create([
            'permission' => $permission,
            'p_component_id' => $request->component
        ]);
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
        $permission = Permission::find($id);

        return view('admin.permissions.edit')->with('permission', $permission)
                                                ->with('p_components', PermissionComponent::all());
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
        $permission = Permission::find($id);
        $permission->permission = str_slug($request->permission);
        $permission->p_component_id = $request->component;
        $permission->save();
        
        Session::flash('success', 'Permission Updated Successfully!!!');
        return redirect()->route('permission.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Permission::find($id)->delete();
        return redirect()->route('permission.index');
    }
}
