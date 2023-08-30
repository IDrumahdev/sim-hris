<?php

namespace App\Repositories\Master\JobTitle;

use App\Models\JobTitle;
use App\Repositories\Master\JobTitle\JobTitleDesign;

class JobTitleResponse implements JobTitleDesign {

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(JobTitle $model)
    {
        $this->model = $model;
    }
    public function database()
    {
        return $this->model->select('id','job_title_name','description','created_at');
    }
}
