<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use DB;
class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(! Gate::allows('issue-view')){
            return abort(401);
        }
        return view('admin.issue.index')->with('issues', Issue::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(! Gate::allows('issue-add')){
            return abort(401);
        }
        // dd(DB::table('issues')->where('parent_id', null)->get());
        return view('admin.issue.create')->with('issues', DB::table('issues')->where('parent_id', null)->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(! Gate::allows('issue-add')){
            return abort(401);
        }
        Issue::create($request->all());
        return redirect()->route('issue.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function show(Issue $issue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(! Gate::allows('issue-edit')){
            return abort(401);
        }
        $i = Issue::find($id);
        return view('admin.issue.edit')->with('issue', Issue::findOrFail($id))->with('issues', DB::table('issues')->where('parent_id', null)->get());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(! Gate::allows('issue-edit')){
            return abort(401);
        }
        $issue = Issue::findOrFail($id);
        $issue->update($request->all());
        return redirect()->route('issue.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(! Gate::allows('issue-delete')){
            return abort(401);
        }
        Issue::find($id)->delete();
        return redirect()->route('issue.index');
    }
}
