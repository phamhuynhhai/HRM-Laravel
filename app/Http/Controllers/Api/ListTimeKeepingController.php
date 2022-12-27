<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ds_timekeeping;
use Illuminate\Http\Request;
use App\Http\Resources\ListTimeKeepingResource;

class ListTimeKeepingController extends Controller
{
    public $text;
    public function index()
    {
        $timekeeping = Ds_timekeeping::join('employee', 'employee.ma_employee', '=', 'ds_timekeeping.ma_employee')
            ->get();
        return ListTimeKeepingResource::collection($timekeeping);
    }


    public function getTimekeeping(Request $request)
    {

        $ds_timekeeping = Ds_timekeeping::all();
        return response()->json($ds_timekeeping);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach ($request->data as $value) {
            $timekeeping =  Ds_timekeeping::create($value); //except('__rowNum__')
        }

        $ds_timekeeping = Ds_timekeeping::all();
        return response()->json($ds_timekeeping);
    }
    public function listYear()
    {
        $arr = [];
        $years = Ds_timekeeping::select('year')->get();
        $unique = $years->unique('year');
        foreach ($unique as $value) {
            array_push($arr, $value);
        }
        return response()->json(['years' => $arr]);
    }
}
