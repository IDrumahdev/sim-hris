<?php

namespace App\Http\Controllers\Admin\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Master\Employee\EmployeeResponse;

class EmployeeController extends Controller
{
    protected $EmployeeResponse;
    public function __construct(EmployeeResponse $EmployeeResponse)
    {
        $this->EmployeeResponse = $EmployeeResponse;
    }

    public function index(Request $request)
    {
        $result = $this->EmployeeResponse->datatable();
    }
}
