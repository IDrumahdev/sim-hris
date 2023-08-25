<?php

namespace App\Http\Controllers\Admin\Master;

use App\Helper\NIP;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
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
        if($request->ajax()) {
            $result = $this->EmployeeResponse->datatable();
                return DataTables::eloquent($result)
                ->rawColumns(['action'])
                ->escapeColumns(['action'])
                ->smart(true)
                ->make();
        }
            return view('master.data.employee.index');
    }

    public function create()
    {
        return view('master.data.employee.create');
    }

    public function store(Request $request)
    {
        $this->EmployeeResponse->store($param);
    }
}
