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

    public function store($param)
    {
        $this->model->create([
            'job_title_name'    => $param->job_title,
            'description'       => $param->description
        ]);
    }

    public function find($id)
    {
        return $this->model->select('id','job_title_name','description')->whereId($id)->firstOrFail();
    }

    public function update($param, $id)
    {
        $this->model->whereId($id)->update([
            'job_title_name'    => $param->job_title,
            'description'       => $param->description
        ]);
    }

    public function delete($id)
    {
       $result = $this->model->find($id);
        $result->delete();
    }
}
