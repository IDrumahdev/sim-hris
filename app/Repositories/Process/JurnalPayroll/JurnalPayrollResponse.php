<?php

namespace App\Repositories\Process\JurnalPayroll;

use App\Models\payrollJurnal;
use App\Repositories\Process\JurnalPayroll\JurnalPayrollDesign;

class JurnalPayrollResponse implements JurnalPayrollDesign {

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(payrollJurnal $model)
    {
        $this->model = $model;
    }

    public function list()
    {
        return $this->model->select('payroll_id','period_payroll_id','date_payrol','take_home_pay','description','created_at')
                            ->with('payroll.employee.job_title')
                            ->with('payroll.employee.department');
    }
}
