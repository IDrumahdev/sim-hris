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
                                <a href="'.url(route('periodPayroll.edit',$action->id)).'" type="button" class="btn btn-success btn-sm btn-size">
                                    Edit
                                </a>
                            ';
                return $Edit;
            })

            ->editColumn('created_at', function ($created) {
                return Carbon::create($created->created_at)->format('d-m-Y H:i:s');
            })
            ->editColumn('status', function ($status) {
                return $status->status === 0 ? 'False' : 'True';
            })
            ->rawColumns(['action'])
            ->escapeColumns(['action'])
            ->smart(true)
            ->make();
        }
            return view('master.data.Period_payroll.index');
    }

    public function create()
    {
        return view('master.data.Period_payroll.create');
    }

    public function store(Request $request)
    {
        try {
            $this->PeriodPayrollResponse->store($request);
            $notification = [
                'message'     => 'Successfully created Data Period Payroll.',
                'alert-type'  => 'success',
                'gravity'     => 'bottom',
                'position'    => 'right'
            ];
                return redirect()->route('periodPayroll.index')->with($notification);
        } catch (\Throwable $th) {
            $notification = [
                'message'     => 'Failed to created Data Period Payroll.',
                'alert-type'  => 'danger',
                'gravity'     => 'bottom',
                'position'    => 'right'
            ];
                return redirect()->route('periodPayroll.index')->with($notification);
        }
    }

    public function edit($id)
    {
        $result = $this->PeriodPayrollResponse->find($id);
            return view('master.data.Period_payroll.edit',compact('result'));
    }

    public function update(Request $request, $id)
    {
        try {
            $this->PeriodPayrollResponse->update($request, $id);
            $notification = [
                'message'     => 'Successfully update Data Period Payroll.',
                'alert-type'  => 'success',
                'gravity'     => 'bottom',
                'position'    => 'right'
            ];
                return redirect()->route('periodPayroll.index')->with($notification);
        } catch (\Throwable $th) {
            $notification = [
                'message'     => 'Failed to updated Data Period Payroll.',
                'alert-type'  => 'danger',
                'gravity'     => 'bottom',
                'position'    => 'right'
            ];
                return redirect()->route('periodPayroll.index')->with($notification);
        }
    }
}
