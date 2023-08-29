<?php

namespace App\Http\Controllers\Admin\Master;

use Carbon\Carbon;
use App\Helper\IDR;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Master\Payroll\PayrollResponse;

class PayrollController extends Controller
{
    protected $PayrollResponse;
    public function __construct(PayrollResponse $PayrollResponse)
    {
        $this->PayrollResponse = $PayrollResponse;
    }

    public function index(Request $request)
    {
        if($request->ajax()) {
            $result = $this->PayrollResponse->datatabel();
                return DataTables::eloquent($result)

                ->addColumn('action', function ($action) {
                    $Edit   =   '
                                    <a href="" type="button" class="btn btn-success btn-sm btn-size">
                                        Edit
                                    </a>
                                ';
                    return $Edit;
                })

                ->editColumn('created_at', function ($created) {
                    return Carbon::create($created->created_at)->format('d-m-Y H:i:s');
                })

                ->editColumn('basic_salary', function ($basic) {
                    return "Rp." . IDR::Format($basic->basic_salary);
                })

                ->editColumn('allowance', function ($data) {
                    return "Rp." . IDR::Format($data->allowance);
                })

                ->editColumn('total_salary', function ($data) {
                    return "Rp." . IDR::Format($data->total_salary);
                })

                ->rawColumns(['action'])
                ->escapeColumns(['action'])
                ->smart(true)
                ->make();
        }
            return view('master.data.payroll.index');
    }

    public function create()
    {
        $employees = $this->PayrollResponse->employee();
            return view('master.data.payroll.create',compact('employees'));
    }
}
