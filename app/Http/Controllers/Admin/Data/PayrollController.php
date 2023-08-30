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

    public function process()
    {
        $periods = $this->JurnalPayrollResponse->periodPayroll();
            return view('master.process.payroll.process',compact('periods'));
    }

    public function storePayroll(Request $request)
    {
        try {
            $result = $this->JurnalPayrollResponse->store($request);
            if($result === 1) {
                $notification = [
                    'message'     => "The Payroll Journal process has been done for that period.",
                    'alert-type'  => 'warning',
                    'gravity'     => 'bottom',
                    'position'    => 'right'
                ];
                    return redirect()->route('jurnalPayroll.list')->with($notification);
            }
                $notification = [
                    'message'     => 'Successfully created Jurnal Payroll.',
                    'alert-type'  => 'success',
                    'gravity'     => 'bottom',
                    'position'    => 'right'
            ];
                    return redirect()->route('jurnalPayroll.list')->with($notification);
        } catch (\Throwable $th) {
            $notification = [
                'message'     => 'Failed to created Jurnal Payroll.',
                'alert-type'  => 'danger',
                'gravity'     => 'bottom',
                'position'    => 'right'
            ];
                return redirect()->route('jurnalPayroll.list')->with($notification);
        }
    }
}
