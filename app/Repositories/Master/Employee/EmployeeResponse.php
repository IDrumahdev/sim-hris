<?php

namespace App\Repositories\Master\Employee;

use App\Models\Employee;
use App\Models\JobTitle;
use App\Models\Department;
use App\Repositories\Master\Employee\EmployeeDesign;

class EmployeeResponse implements EmployeeDesign {

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;
    protected $JobTitle;
    protected $department;

    public function __construct(Employee $model, JobTitle $JobTitle, Department $department)
    {
        $this->model        = $model;
        $this->JobTitle     = $JobTitle;
        $this->department   = $department;
    }

    public function jobTitleList()
    {
        return $this->JobTitle->select('id','job_title_name')->latest()->get();
    }

    public function department()
    {
        return $this->department->select('id','department_name')->latest()->get();
    }

    public function datatable()
    {
        return $this->model->select('nip','full_name','birth_day','gender','address','mobilephone','email','date_of_entry','job_title','department');
    }


    public function store($param)
    {
        # code...
    }
}
