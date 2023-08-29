<?php

namespace App\Repositories\Master\Payroll;

use App\Models\Employee;
use App\Models\Payroll;
use App\Repositories\Master\Payroll\PayrollDesign;

class PayrollResponse implements PayrollDesign {

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;
    protected $employee;

    public function __construct(Payroll $model, Employee $employee)
    {
        $this->model    = $model;
        $this->employee = $employee;
    }

    public function datatabel()
    {
        return $this->model->select('id','basic_salary','employee_id','allowance','total_salary','created_at')
                            ->with('employee.job_title','employee.department');
    }

    public function employee()
    {
        return $this->employee->latest()->get();
    }

    public function store($param)
    {
        $total = $param->basic_salary + $param->allowance;
        $this->model->create([
            'basic_salary'      => $param->basic_salary,
            'employee_id'       => $param->employee_id,
            'allowance'         => $param->allowance,
            'total_salary'      => $total
        ]);
    }

    public function find($id)
    {
        return $this->model->select('id','basic_salary','employee_id','allowance','total_salary','created_at')
                            ->whereId($id)->firstOrFail();
    }

    public function update($param, $id)
    {
        $total = $param->basic_salary + $param->allowance;
        $this->model->whereId($id)->update([
            'basic_salary'      => $param->basic_salary,
            'allowance'         => $param->allowance,
            'total_salary'      => $total
        ]);
    }
}
