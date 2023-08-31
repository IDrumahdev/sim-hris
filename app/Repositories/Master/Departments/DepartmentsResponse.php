<?php
namespace App\Repositories\Master\Departments;

use App\Models\Department;
use App\Repositories\Master\Departments\DepartmentsDesign;

class DepartmentsResponse implements DepartmentsDesign {

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(Department $model)
    {
        $this->model = $model;
    }

    public function datatable()
    {
        return $this->model->select('id','department_name','description','created_at');
    }

    public function store($param)
    {
        $this->model->create([
            'department_name'   => $param->department_name,
            'description'       => $param->description
        ]);
    }

    public function find($id)
    {
        return $this->model->select('id','department_name','description')->whereId($id)->firstOrFail();
    }

    public function update($param, $id)
    {
        $this->model->whereId($id)->update([
            'department_name'   => $param->department_name,
            'description'       => $param->description
        ]);
    }
}
