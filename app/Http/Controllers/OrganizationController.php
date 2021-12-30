<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Http\Requests\StoreOrganizationRequest;
use App\Http\Requests\UpdateOrganizationRequest;
use Illuminate\Support\Facades\Gate;

class OrganizationController extends Controller
{

    // public function authorize()
    // {
    //     return true; // this is false by default which means unauthorized 403
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(! Gate::allows('org-view')){
            return abort(401);
        }
        return view('admin.organization.index')->with('orgs', Organization::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(! Gate::allows('org-add')){
            return abort(401);
        }
        return view('admin.organization.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrganizationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrganizationRequest $request)
    {
        if(! Gate::allows('org-add')){
            return abort(401);
        }
        // dd($request);
        
        $input = $request->all();
        // dd($request->file('logo'));
        if ($image = $request->file('logo')) {
            $destinationPath = 'admin_assets/images/';
            $orgImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            // dd($orgImage);
            $image->move($destinationPath, $orgImage);
            $input['logo'] = "$orgImage";
        }
        // dd('hello');
        $org = Organization::create($input);
        return redirect()->route('org.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(! Gate::allows('org-edit')){
            return abort(401);
        }

        return view('admin.organization.edit')->with('org', Organization::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrganizationRequest  $request
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrganizationRequest $request, $id)
    {
        if(! Gate::allows('org-edit')){
            return abort(401);
        }
        $input = $request->all();
        if ($image = $request->file('logo')) {
            $destinationPath = 'admin_assets/images/';
            $orgImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            // dd($orgImage);
            $image->move($destinationPath, $orgImage);
            $input['logo'] = "$orgImage";
        }

        $org = Organization::findOrFail($id);
        $org->update($input);
        return redirect()->route('org.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(! Gate::allows('org-delete')){
            return abort(401);
        }
        Organization::find($id)->delete();
        return redirect()->route('org.index');

    }
}
