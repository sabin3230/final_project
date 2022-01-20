<?php

namespace App\Http\Controllers;

use App\Models\Servicing;
use App\Models\Employee;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\ServicingCompleteMail;
use Illuminate\Support\Facades\Gate;

class ServicingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.servicing.index')->with('servicings', Servicing::all())
                                            ->with('employees', Employee::all());
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
       if(!Servicing::find($request['booking_id'])){
            $servicing = Servicing::create([
                'booking_id'=> $request['booking_id']
            ]);
       }
        
        return redirect()->route('booking.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Servicing  $servicing
     * @return \Illuminate\Http\Response
     */
    public function show(Servicing $servicing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Servicing  $servicing
     * @return \Illuminate\Http\Response
     */
    public function edit(Servicing $servicing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Servicing  $servicing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Servicing $servicing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Servicing  $servicing
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(! Gate::allows('servicing-delete')){
            return abort(401);
        }
        Servicing::find($id)->delete();
        return redirect()->route('servicing.index');

    }

    public function getStartTask($id): \Illuminate\Http\JsonResponse
    {

        $task = Servicing::find($id);
        if(!$task){
            return response()->json(array(
                'error'      => array('message'=>'Something Went Wrong Please contact your admin'),
            ),403);
        }
        if($task->employee_id == null){
            return response()->json(array(
                'error'      => array('message'=>'Task must be assigned before starting a task'),
            ),403);
        }
        $task->update(
            ['start_time' => Carbon::now()->setTimezone('Asia/Kathmandu'),
            'status' => 'servicing']);

        return response()->json(array(
            'success'      => array(
                'message'=>'Task is successfully started at'.$task->start_time,
                'start_time'=>$task->start_time,
            ),
        ),200);
    }

    public function completeService(Request $request, $id){
        $servicing = Servicing::findOrfail($id);
        // dd($servicing->bookings->customerVehicles);
        if(!$servicing){
            return response()->json(array(
                'error'      => array('message'=>'Something Went Wrong Please contact your admin'),
            ),403);
        }
        $servicing->update([
            'end_time'     => Carbon::now()->setTimezone('Asia/Kathmandu'),
            'status'       => 'completed',
            'next_servicing' => Carbon::now()->addMonths(3),
            ]
        );
        $this->sendMail($servicing);
        return response()->json(array(
            'success'      => array(
                'message'=>'Servicing is completed successfully at '.$servicing->end_time,
                'next_servicing'=>$servicing->next_servicing,
        ),
        ),200);

    }


    public function assignEmployee(Request $request, $id){
        $service = Servicing::findorfail($id);
        if(!$service){
            return response()->json(array(
                'error'      => array('message'=>'Something went wrong'),
            ),200);
        }
        $service->update(['employee_id' => $request->value]);
        $employee = $service->employee->user->first_name.' '.$service->employee->user->last_name;
        return response()->json(array(
            'success'      => array('message'=>'Task is assigned to '. $employee),
        ),200);
        return response()->json($id);
    }

    public function checkIssue($id): \Illuminate\Http\JsonResponse{
        // dd($id);
        $servicing = Servicing::findOrFail($id);
        if(!$servicing){
            return response()->json(array(
                'error'      => array('message'=>'Something went wrong'),
            ),200);
        }
        $data = collect();
        $issues = $servicing->bookings->issues;
        $remark = $servicing->remarks;
        foreach ($issues as $issue) {
            // $issue['parent'] = $issue->parent;
            $data->push($issue);
            $data->push($issue->parent);
        }
        return response()->json(array(
            'data' => $data,
            'remark'=> $remark,
        ));
        // dd($servicing->bookings->issues);
    }


    public function sendMail($servicing){
        $customer = $servicing->bookings->customerVehicles->customer->user;
        // dd($customer);
        // $customer = Customer::where('id', $id->customer_id)->first();

        $customer_email = $customer->email;
        $data =array(
            'name' => $customer->first_name,
            'message' => 'Your Vehicle has been serviced please come and pick.',
            'nextService' => $servicing->next_servicing,
        );

        Mail::to($customer->email)
            ->send(new ServicingCompleteMail($data));
        return 200;
    }

    public function next_servicing($servicing){

        $servicing = Servicing::findorfail($data->nextService);
        return redirect()->route('servicing.index');

    }

    public function servicingRemarks($id, Request $request){
        $servicing = Servicing::findOrFail($id);
        if(!$servicing){
            return response()->json(array(
                'error'      => array('message'=>'Something went wrong'),
            ),200);
        }
        $servicing->update([
            'remarks' => $request->remarks
        ]);
        return response()->json(array(
            'success'      => array(
                'message'=>'Remarks saved successfully!!',
        ),
        ),200);

    }

}
