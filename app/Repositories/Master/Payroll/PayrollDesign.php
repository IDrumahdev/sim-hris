<?php

namespace App\Repositories\Master\Payroll;

interface PayrollDesign
{
    public function datatabel();
    public function employee();
    public function store($param);
    public function update($param, $id);
}
