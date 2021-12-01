<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Organization;
use App\Http\Requests\StorebranchRequest;
use App\Http\Requests\UpdatebranchRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(! Gate::allows('branch-view')){
            return abort(401);
        }
        return view('admin.branch.index')->with('branchs', Branch::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(! Gate::allows('branch-add')){
            return abort(401);
        }
        return view('admin.branch.create')->with('organizations', Organization::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorebranchRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorebranchRequest $request)
    {
        if(! Gate::allows('branch-add')){
            return abort(401);
        }
        $input = $request->all();
        $input['slug']= Str::slug($input['branch_name']);
        Branch::create($input);
        return redirect()->route('branch.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(! Gate::allows('branch-edit')){
            return abort(401);
        }
        return view('admin.branch.edit')->with('branchs', Branch::findOrFail($id))
                                                ->with('organizations',Organization::all());
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatebranchRequest  $request
     * @param  \App\Models\branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBranchRequest $request, $id)
    {
        if(! Gate::allows('branch-edit')){
            return abort(401);
        }
        $branch = Branch::findOrFail($id);
        $branch->update($request->all());
        return redirect()->route('branch.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(! Gate::allows('branch-delete')){
            return abort(401);
        }
        Branch::find($id)->delete();
        return redirect()->route('branch.index');
    }
}
