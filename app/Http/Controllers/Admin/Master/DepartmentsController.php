<?php

namespace App\Http\Controllers\Admin\Master;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Master\Departments\DepartmentsResponse;

class DepartmentsController extends Controller
{
    protected $DepartmentsResponse;
    public function __construct(DepartmentsResponse $DepartmentsResponse)
    {
        $this->DepartmentsResponse = $DepartmentsResponse;
    }

    public function index(Request $request)
    {
        if($request->ajax()) {

            $result = $this->DepartmentsResponse->datatable();
            return DataTables::eloquent($result)
            ->editColumn('created_at', function ($created) {
                $date = Carbon::create($created->created_at)->format('d-m-Y H:i:s');
                return $date;
            })

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
            return view('master.data.department.index');
    }

    public function create()
    {
        return view('master.data.department.create');
    }
}
