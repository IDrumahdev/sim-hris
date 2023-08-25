<?php

namespace App\Http\Controllers\Admin\Master;

use App\Helper\NIP;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Data\Employee\store;
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
        $jobtitles      = $this->EmployeeResponse->jobTitleList();
        $departments    = $this->EmployeeResponse->department();
            return view('master.data.employee.create',compact('jobtitles','departments'));
    }

    public function store(store $request)
    {
        dd($request->all());
        $this->EmployeeResponse->store($request);
    }
}
