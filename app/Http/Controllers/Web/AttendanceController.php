<?php

namespace App\Http\Controllers\Web;

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

    public function create()
    {
        return view('web.attendance');
    }

    public function store(Request $request)
    {
        $check = $this->AttendanceEmployeeResponse->check_attendance($request->nip_employee);
        if ($check === 0) {
            $notification = [
                'message'     => "NIP $request->nip_employee data not found in database.",
                'alert-type'  => 'danger',
                'gravity'     => 'top',
                'position'    => 'center'
            ];
                    return redirect()->route('attendance.create')->with($notification);
        } elseif (!$check) {
            $this->AttendanceEmployeeResponse->storeChekIn($request);
            $notification = [
                'message'     => 'Successfully Check In Attendance Employee.',
                'alert-type'  => 'success',
                'gravity'     => 'top',
                'position'    => 'center'
            ];
                    return redirect()->route('attendance.create')->with($notification);
        } elseif ($check) {
            $this->AttendanceEmployeeResponse->storeCheckOut($request);
            $notification = [
                'message'     => 'Successfully Check Out Attendance Employee.',
                'alert-type'  => 'success',
                'gravity'     => 'top',
                'position'    => 'center'
            ];
                    return redirect()->route('attendance.create')->with($notification);
        }
    }
}
