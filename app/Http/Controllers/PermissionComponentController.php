<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Models\PermissionComponent;
use Session;

class PermissionComponentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('permission-view')) {
            return abort(401);
        }
        return view('admin.permission_components.index')->with('components', PermissionComponent::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Gate::allows('permission-add')) {
            return abort(401);
        }
        return view('admin.permission_components.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Gate::allows('permission-add')) {
            return abort(401);
        }
        $this->validate($request, [
            'component' => 'required'
        ]);
        PermissionComponent::create($request->all());

        return redirect()->route('p_component.index');
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
        if (!Gate::allows('permission-edit')) {
            return abort(401);
        }
        return view('admin.permission_components.edit')->with('p_component', PermissionComponent::find($id));
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
        if (!Gate::allows('permission-edit')) {
            return abort(401);
        }
        permission_component::find($id)->update($request->all());

        return redirect()->route('p_component.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Gate::allows('permission-delete')) {
            return abort(401);
        }
        permission_component::find($id)->delete();

        return redirect()->back();
    }
}
