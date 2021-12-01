<?php

namespace App\Http\Controllers;

use App\Models\department;
use App\Models\Branch;
use App\Models\Organization;
use App\Http\Requests\StoredepartmentRequest;
use App\Http\Requests\UpdatedepartmentRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(! Gate::allows('department-view')){
            return abort(401);
        }
        return view('admin.department.index')->with('departments', Department::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(! Gate::allows('department-add')){
            return abort(401);
        }
        return view('admin.department.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoredepartmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoredepartmentRequest $request)
    {
        if(! Gate::allows('department-add')){
            return abort(401);
        }
        $input = $request->all();
        $input['slug']= Str::slug($input['department_name']);
        Department::create($input);
        return redirect()->route('department.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(! Gate::allows('department-edit')){
            return abort(401);
        }
        return view('admin.department.edit')->with('departments', Department::findOrFail($id));
                                        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedepartmentRequest  $request
     * @param  \App\Models\department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatedepartmentRequest $request, $id)
    {
        if(! Gate::allows('department-edit')){
            return abort(401);
        }
        $department = Department::findOrFail($id);
        $department->update($request->all());
        return redirect()->route('department.index');

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(! Gate::allows('department-delete')){
            return abort(401);
        }
        Department::find($id)->delete();
        return redirect()->route('department.index');
    }
}
