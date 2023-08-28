<?php
namespace App\Repositories\Web\AttendanceEmployee;

use Carbon\Carbon;
use App\Models\attendance;
use App\Models\Employee;
use App\Repositories\Web\AttendanceEmployee\AttendanceEmployeeDesign;

class AttendanceEmployeeResponse implements AttendanceEmployeeDesign {

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;
    protected $employee;

    public function __construct(attendance $model, Employee $employee)
    {
        $this->model    = $model;
        $this->employee = $employee;
    }

    public function datatable()
    {
        return $this->model->select('id','employee_id', 'date_attendance', 'check_in','check_out', 'description', 'status_attendance','created_at')
                            ->with('employee.job_title','employee.department');
    }

    public function check_attendance($nip)
    {
        $employee_id    = $this->employee->select('id')
                                        ->whereNip($nip)
                                        ->first();
            if(!$employee_id) {
                return 0;
            }
                $dateNow        = Carbon::now()->format('Y-m-d');
                return $this->model->whereEmployeeId($employee_id->id)
                                    ->whereDateAttendance($dateNow)
                                    ->first();
    }
    
    public function storeChekIn($param)
    {
        $employee_id = $this->findNip($param->nip_employee);
        $this->model->create([
            'employee_id'     => $employee_id->id,
            'date_attendance' => Carbon::now()->format('Y-m-d'),
            'check_in'        => Carbon::now()->format('H:i:s'),
        ]);
    }

    public function storeCheckOut($param)
    {
        $employee_id = $this->findNip($param->nip_employee);
        $this->model->whereEmployeeId($employee_id->id)->update([
            'check_out' => Carbon::now()->format('H:i:s'),
        ]);
    }

    private function findNip($nip) {
        return $this->employee->select('id')->whereNip($nip)->first();
    }
    
}
