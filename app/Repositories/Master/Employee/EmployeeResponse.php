<?php

namespace App\Repositories\Master\Employee;

use App\Models\Employee;
use App\Repositories\Master\Employee\EmployeeDesign;

class EmployeeResponse implements EmployeeDesign {

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(Employee $model)
    {
        $this->model = $model;
    }

    public function datatable()
    {
        return $this->model->select('nip','full_name','birth_day','gender','address','mobilephone','email','date_of_entry','job_title','department');
    }
}
