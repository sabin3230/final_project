<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use App\Models\Servicing;
use App\Models\Customer;
use DB;

class ChartController extends Controller
{
    public function servicing(){
        $start= Carbon::now()->subDays(30);
        $end = Carbon::now();
        $period = CarbonPeriod::create($start, $end);
        $dates = [];
        foreach ($period as $date) {
            array_push($dates, $date->format('Y-m-d'));
        }

        $servicings=collect();
        foreach(Servicing::all() as $servicing){
            $servicing->created_at = $servicing->created_at->format('Y-m-d');
            $servicings->push($servicing);
        }
        $servicing_count = Servicing::selectRaw("DATE(created_at) as created_date,count(DATE(created_at)) as count")->groupBy('created_date')->get();
        $month_servicing = $servicing_count->whereIn('created_date',$dates);
        $data = array(
            "servicing" => $month_servicing,
            "dates" => $dates
        );
        return response()->json($data);
    }


        
}
