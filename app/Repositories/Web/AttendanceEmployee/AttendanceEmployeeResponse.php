<?php
namespace App\Repositories\Web\AttendanceEmployee;

use Carbon\Carbon;
use App\Models\attendance;
use App\Repositories\Web\AttendanceEmployee\AttendanceEmployeeDesign;

class AttendanceEmployeeResponse implements AttendanceEmployeeDesign {

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(attendance $model)
    {
        $this->model = $model;
    }

    public function check_attendance($nip)
    {
        $dateNow = Carbon::now()->format('Y-m-d');
        return $this->model->whereEmployeeId($nip)
                            ->whereDateAttendance($dateNow)
                            ->first();
    }
    public function store($param)
    {
        $this->model->create([
            'employee_id'     => 'a8bc20538b8547dda33d9f5d5959172b',
            'date_attendance' => Carbon::now()->format('Y-m-d'),
            'check_in'        => Carbon::now()->format('H:i:s'),
            'check_out'       => Carbon::now()->format('H:i:s'),
            'description'     => 'default Attendance WFO'
        ]);
    }
    
}
