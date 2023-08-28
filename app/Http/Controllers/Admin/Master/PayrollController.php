<?php

namespace App\Http\Controllers\Admin\Master;

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

                ->rawColumns(['action'])
                ->escapeColumns(['action'])
                ->smart(true)
                ->make();
        }
                return view('master.data.payroll.index');
    }
}
