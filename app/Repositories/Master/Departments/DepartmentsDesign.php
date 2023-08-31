<?php

namespace App\Repositories\Master\Departments;

interface DepartmentsDesign {
    public function datatable();
    public function store($param);
    public function find($id);
    public function update($param, $id);
}
