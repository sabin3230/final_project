<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Employee;
use DB;
use Illuminate\Support\Facades\Gate;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class EmployeeController extends Controller
{
    public function index()
    {
        if(! Gate::allows('employee-view')){
            return abort(401);
        }
        return view('admin.employee.index')->with('employees', Employee::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(! Gate::allows('employee-add')){
            return abort(401);
        }
        // dd(DB::table('roles')->where('role', 'Employee')->first());
        return view('admin.employee.create')->with('departments', Department::all())->with('role', DB::table('roles')->where('role', 'Employee')->first());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrganizationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(! Gate::allows('employee-add')){
            return abort(401);
        }
        // dd($request);
        
        $user  = User::create([
            'first_name'=> request('first_name'),
            'last_name'=> request('last_name'),
            'role_id'=>request('role_id'),
            'address'=>request('address'),
            'email'=>request('email'),
            'contact'=>request('contact'),
            'alt_contact'=>request('alt_contact'),
            'password'=>Hash::make($request['password']),
        ]);
        
        $employee = Employee::create([
            'user_id' => $user->id,
            'department_id' => request('department_id'),
            'status' => request('status'),
        ]);
        return redirect()->route('employee.index');

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
        if(! Gate::allows('employee-edit')){
            return abort(401);
        }
        $employee = Employee::find($id);
        return view('admin.employee.edit')->with('departments', Department::all())->with('employee', $employee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrganizationRequest  $request
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(! Gate::allows('employee-edit')){
            return abort(401);
        }
    
        $employee = Employee::findOrFail($id);
        $user=$employee->user;
        $user->update([
            'first_name'=> request('first_name'),
            'last_name'=> request('last_name'),
            'role_id'=>request('role_id'),
            'address'=>request('address'),
            'email'=>request('email'),
            'contact'=>request('contact'),
            'alt_contact'=>request('alt_contact'),
        ]);
        
        $employee->update([
            'user_id' => $user->id,
            'department_id' => request('department_id'),
            'status' => request('status')
        ]);
        // $employee->update($input);
        return redirect()->route('employee.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(! Gate::allows('employee-delete')){
            return abort(401);
        }
        Employee::find($id)->delete();
        return redirect()->route('employee.index');

    }
}
