<?php

namespace App\Http\Controllers\Admin\Master;

use Carbon\Carbon;
use App\Helper\NIP;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Data\Employee\store;
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

                ->addColumn('action', function ($action) {
                    $Edit   =   '
                                    <a href="'.url(route('employee.edit',$action->id)).'" type="button" class="btn btn-success btn-sm btn-size">
                                        Edit
                                    </a>
                                ';
                    return $Edit;
                })

                ->editColumn('created_at', function ($created) {
                    $date = Carbon::create($created->created_at)->format('d-m-Y H:i:s');
                    return $date;
                })

                ->editColumn('birth_day', function ($birth) {
                    $date = Carbon::create($birth->birth_day)->format('d-m-Y');
                    return $date;
                })

                ->editColumn('date_of_entry', function ($date_of) {
                    $date = Carbon::create($date_of->date_of_entry)->format('d-m-Y');
                    return $date;
                })

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
        try {
            $this->EmployeeResponse->store($request);
            $notification = [
                'message'     => 'Successfully created Data Employee.',
                'alert-type'  => 'success',
                'gravity'     => 'bottom',
                'position'    => 'right'
            ];
                return redirect()->route('employee.index')->with($notification);
        } catch (\Throwable $th) {
            $notification = [
                'message'     => 'Failed to created Data Employee.',
                'alert-type'  => 'danger',
                'gravity'     => 'bottom',
                'position'    => 'right'
            ];
                return redirect()->route('employee.index')->with($notification);
        }
    }

    public function edit($id)
    {
        $result         = $this->EmployeeResponse->find($id);
        $departments    = $this->EmployeeResponse->department();
        $jobtitles      = $this->EmployeeResponse->jobTitleList();
            return view('master.data.employee.edit',compact('jobtitles','departments','result'));
    }

    public function update(Request $request, $id)
    {
        try {
            $this->EmployeeResponse->update($request, $id);
            $notification = [
                'message'     => 'Successfully updated Data Employee.',
                'alert-type'  => 'success',
                'gravity'     => 'bottom',
                'position'    => 'right'
            ];
                    return redirect()->route('employee.index')->with($notification);
        } catch (\Throwable $th) {
            $notification = [
                'message'     => 'Failed to updated Data Employee.',
                'alert-type'  => 'danger',
                'gravity'     => 'bottom',
                'position'    => 'right'
            ];
                return redirect()->route('employee.index')->with($notification);
        }
    }
}
