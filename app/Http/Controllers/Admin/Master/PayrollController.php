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
                                    <a href="'.url(route('payroll.edit',$action->id)).'" type="button" class="btn btn-success btn-sm btn-size">
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

    public function store(Request $request)
    {
        try {
            $this->PayrollResponse->store($request);
            $notification = [
                'message'     => 'Successfully created Data Payroll.',
                'alert-type'  => 'success',
                'gravity'     => 'bottom',
                'position'    => 'right'
            ];
                    return redirect()->route('payroll.index')->with($notification);
        } catch (\Throwable $th) {
            $notification = [
                'message'     => 'Failed to created Data Payroll.',
                'alert-type'  => 'danger',
                'gravity'     => 'bottom',
                'position'    => 'right'
            ];
                return redirect()->route('payroll.index')->with($notification);
        }
    }

    public function edit($id)
    {
        $employees  = $this->PayrollResponse->employee();
        $result     = $this->PayrollResponse->find($id);
            return view('master.data.payroll.edit',compact('result','employees'));
    }

    public function update(Request $request, $id)
    {
        try {
            $this->PayrollResponse->update($request, $id);
            $notification = [
                'message'     => 'Successfully updated Data Payroll.',
                'alert-type'  => 'success',
                'gravity'     => 'bottom',
                'position'    => 'right'
            ];
                return redirect()->route('payroll.index')->with($notification);
        } catch (\Throwable $th) {
            $notification = [
                'message'     => 'Failed to updated Data Payroll.',
                'alert-type'  => 'danger',
                'gravity'     => 'bottom',
                'position'    => 'right'
            ];
                return redirect()->route('payroll.index')->with($notification);
        }
    }
}
