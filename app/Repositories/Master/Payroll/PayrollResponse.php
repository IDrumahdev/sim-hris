<?php

namespace App\Repositories\Master\Payroll;

use App\Models\Payroll;
use App\Repositories\Master\Payroll\PayrollDesign;

class PayrollResponse implements PayrollDesign{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(Payroll $model)
    {
        $this->model = $model;
    }

    public function datatabel()
    {
        return $this->model->select('id','basic_salary','employee_id','allowance','total_salary','created_at')
                            ->with('employee.job_title','employee.department');
    }
}
