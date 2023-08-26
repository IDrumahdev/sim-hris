<?php

namespace App\Repositories\Master\Employee;

interface EmployeeDesign {
    public function datatable();
    public function jobTitleList();
    public function department();
    public function store($param);
    public function find($id);
}
