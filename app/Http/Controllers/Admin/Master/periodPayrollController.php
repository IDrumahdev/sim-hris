<?php

namespace App\Http\Controllers\Admin\Master;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Master\PeriodPayroll\PeriodPayrollResponse;

class periodPayrollController extends Controller
{
    protected $PeriodPayrollResponse;
    public function __construct(PeriodPayrollResponse $PeriodPayrollResponse)
    {
        $this->PeriodPayrollResponse = $PeriodPayrollResponse;
    }

    public function index(Request $request)
    {
        if($request->ajax()) {
            $result = $this->PeriodPayrollResponse->datatabel();
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
            ->editColumn('status', function ($status) {
                return $status->status === 0 ? 'True' : 'False';
            })
            ->rawColumns(['action'])
            ->escapeColumns(['action'])
            ->smart(true)
            ->make();
        }
            return view('master.data.Period_payroll.index');

    }
}
