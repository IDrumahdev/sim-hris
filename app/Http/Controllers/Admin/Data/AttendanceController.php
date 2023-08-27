<?php

namespace App\Http\Controllers\Admin\Data;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        return view('master.process.attendance.index');
    }   
}
