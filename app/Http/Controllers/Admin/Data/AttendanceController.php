<?php

namespace App\Http\Controllers\Admin\Data;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Web\AttendanceEmployee\AttendanceEmployeeResponse;

class AttendanceController extends Controller
{
    protected $AttendanceEmployeeResponse;
    public function __construct(AttendanceEmployeeResponse $AttendanceEmployeeResponse)
    {
        $this->AttendanceEmployeeResponse = $AttendanceEmployeeResponse;
    }

    public function report(Request $request)
    {
        if($request->ajax()) {
            $result = $this->AttendanceEmployeeResponse->datatable();
            return DataTables::eloquent($result)

            ->editColumn('created_at', function ($created) {
                $date = Carbon::create($created->created_at)->format('d-m-Y H:i:s');
                return $date;
            })
            ->rawColumns([])
            ->escapeColumns([])
            ->smart(true)
            ->make();
        }
            return view('master.process.attendance.index');
    }   
}
