<?php

namespace App\Repositories\Master\JobTitle;

interface JobTitleDesign {
    public function database();
    public function store($param);
    public function find($id);
    public function update($param, $id);
}
