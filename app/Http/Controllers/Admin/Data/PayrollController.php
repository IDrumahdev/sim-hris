<?php

namespace App\Http\Controllers\Admin\Data;

use Carbon\Carbon;
use App\Helper\IDR;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Process\JurnalPayroll\JurnalPayrollResponse;

class PayrollController extends Controller
{
    protected $JurnalPayrollResponse;
    public function __construct(JurnalPayrollResponse $JurnalPayrollResponse)
    {
        $this->JurnalPayrollResponse = $JurnalPayrollResponse;
    }

    public function list(Request $request)
    {
        if($request->ajax()) {

            $result = $this->JurnalPayrollResponse->list();
            return DataTables::eloquent($result)

            ->editColumn('created_at', function ($created) {
                $date = Carbon::create($created->created_at)->format('d-m-Y H:i:s');
                return $date;
            })

            ->editColumn('take_home_pay', function ($data) {
                return "Rp." . IDR::Format($data->take_home_pay);
            })

            ->rawColumns([])
            ->escapeColumns([])
            ->smart(true)
            ->make();
        }
            return view('master.process.payroll.index'); 
    }
}
