<?php

namespace App\Repositories\Process\JurnalPayroll;


use App\Models\payrollJurnal;
use App\Models\periodPayroll;
use App\Repositories\Process\JurnalPayroll\JurnalPayrollDesign;

class JurnalPayrollResponse implements JurnalPayrollDesign {

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;
    protected $periodPayroll;

    public function __construct(payrollJurnal $model, periodPayroll $periodPayroll)
    {
        $this->model            = $model;
        $this->periodPayroll    = $periodPayroll;
    }

    public function list()
    {
        return $this->model->select('payroll_id','period_payroll_id','date_payrol','take_home_pay','description','created_at')
                            ->with('payroll.employee.job_title')
                            ->with('payroll.employee.department');
    }

    public function periodPayroll()
    {
        return $this->periodPayroll->select('id','period_name')->latest()->get();
    }
}
