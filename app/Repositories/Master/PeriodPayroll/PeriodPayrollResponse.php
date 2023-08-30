<?php

namespace App\Repositories\Master\PeriodPayroll;

use App\Models\periodPayroll;
use App\Repositories\Master\PeriodPayroll\PeriodPayrollDesign;


class PeriodPayrollResponse implements PeriodPayrollDesign {

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(periodPayroll $model)
    {
        $this->model = $model;
    }

    public function datatabel()
    {
        return $this->model->select('id','period_name','status','description','created_at');
    }

    public function store($param)
    {
        $this->model->create([
            'period_name'   => $param->period_name,
            'description'   => $param->description
        ]);
    }

    public function find($id)
    {
        return $this->model->select('id','period_name','description')->whereId($id)->firstOrFail();
    }

    public function update($param, $id)
    {
        $this->model->whereId($id)->update([
            'period_name'   => $param->period_name,
            'description'   => $param->description
        ]);
    }
}
