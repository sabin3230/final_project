<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Attendence;
use App\Models\Servicing;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class EmployeeDashboardController extends Controller
{
    public function index()
    {
        $employee = Auth::user()->employee;
        $employee_join_date = $employee->created_at;
        $end = Carbon::now();
        $period = CarbonPeriod::create($employee_join_date, $end);

        $dates = [];
        foreach ($period as $date) {
            if(!$date->isWeekend()){
                array_push($dates, $date->format('Y-m-d'));
            }
        }
        $attendances = Attendence::where('employee_id',$employee->id)->get();
        $present = 0;
        $aa = [];
        foreach($attendances as $a){
            array_push($aa,$a->start_date_time->format('Y-m-d'));
        }
        foreach($dates as $date){
            foreach($attendances as $a){
               if($date == $a->start_date_time->format('Y-m-d')){
                $present+=1;
                break;
               }
            }
        }
        $servicing_count = Servicing::where('employee_id',$employee->id)->get()->count();
        $servicings = Servicing::where('employee_id',$employee->id)->whereDate('created_at',$end->format('Y-m-d'))->get();
        $absent = count($dates)-$present;
        return view('employee.dashboard', 
                    compact('present'),
                    compact('absent'),
                    compact('servicings')
                )->with('servicing_count', $servicing_count);
    }

}
