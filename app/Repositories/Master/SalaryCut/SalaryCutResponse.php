<?php

namespace App\Repositories\Master\SalaryCut;

use App\Models\salaryCut;
use App\Repositories\Master\SalaryCut\SalaryCutDesign;

class SalaryCutResponse implements SalaryCutDesign {

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(salaryCut $model)
    {
        $this->model = $model;
    }

    public function datatable()
    {
        return $this->model->select('id','salary_cut_name','nominal','description');
    }

    public function store($param)
    {
        $this->model->create([
            'salary_cut_name'   => $param->salary_cut_name,
            'nominal'           => $param->nominal,
            'description'       => $param->description
        ]);
    }
}
