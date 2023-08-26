<?php

namespace App\Repositories\Master\SalaryCut;

interface SalaryCutDesign {
    public function datatable();
    public function store($param);
    public function find($id);
    public function update($param, $id);
}
