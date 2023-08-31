<?php

namespace App\Repositories\Master\Payroll;

use App\Models\Payroll;
use App\Models\Employee;
use App\Models\salaryCut;
use App\Repositories\Master\Payroll\PayrollDesign;

class PayrollResponse implements PayrollDesign {

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;
    protected $employee;
    protected $salaryCut;

    public function __construct(Payroll $model, Employee $employee, salaryCut $salaryCut)
    {
        $this->model        = $model;
        $this->employee     = $employee;
        $this->salaryCut    = $salaryCut;
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
        $salary_cut = $this->salaryCut->select('id','salary_cut_name','nominal')->whereId($param->salary_cut_id)->first();
        $total      = ($param->basic_salary + $param->allowance) - $salary_cut->nominal;
        $this->model->create([
            'basic_salary'      => $param->basic_salary,
            'employee_id'       => $param->employee_id,
            'salary_cut_id'     => $param->salary_cut_id,
            'allowance'         => $param->allowance,
            'total_salary'      => $total
        ]);
    }

    public function find($id)
    {
        return $this->model->select('id','basic_salary','employee_id','salary_cut_id','allowance','total_salary','created_at')
                            ->whereId($id)->firstOrFail();
    }

    public function update($param, $id)
    {
        $salary_cut = $this->salaryCut->select('id','salary_cut_name','nominal')->whereId($param->salary_cut_id)->first();
        $total      = ($param->basic_salary + $param->allowance) - $salary_cut->nominal;
        $this->model->whereId($id)->update([
            'salary_cut_id'     => $param->salary_cut_id,
            'basic_salary'      => $param->basic_salary,
            'allowance'         => $param->allowance,
            'total_salary'      => $total
        ]);
    }

    public function salaryCut()
    {
        return $this->salaryCut->select('id','salary_cut_name','nominal')->latest()->get();
    }
}
