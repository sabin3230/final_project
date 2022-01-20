<?php

namespace App\Http\Controllers;

use App\Models\feedback;
use App\Http\Requests\StorefeedbackRequest;
use App\Http\Requests\UpdatefeedbackRequest;
use Illuminate\Support\Facades\Gate;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(! Gate::allows('feedback-view')){
            return abort(401);
        }

        return view('admin.feedback')->with('feedbacks', Feedback::all());;
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
     * @param  \App\Http\Requests\StorefeedbackRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorefeedbackRequest $request)
    {
        if(! Gate::allows('feedback-add')){
            return abort(401);
        }

        Feedback::create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function show(feedback $feedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function edit(feedback $feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatefeedbackRequest  $request
     * @param  \App\Models\feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatefeedbackRequest $request, feedback $feedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(! Gate::allows('feedback-delete')){
            return abort(401);
        }
        Feedback::find($id)->delete();
        return redirect()->route('admin.feedback');
    }
}
