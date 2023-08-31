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
                                <a href="'.url(route('departments.edit',$action->id)).'" type="button" class="btn btn-success btn-sm btn-size">
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

    public function store(Request $request)
    {
        try {
            $this->DepartmentsResponse->store($request);
            $notification = [
                'message'     => 'Successfully created Data Department.',
                'alert-type'  => 'success',
                'gravity'     => 'bottom',
                'position'    => 'right'
            ];
                return redirect()->route('departments.index')->with($notification);
        } catch (\Throwable $th) {
            $notification = [
                'message'     => 'Failed to created Data Department.',
                'alert-type'  => 'danger',
                'gravity'     => 'bottom',
                'position'    => 'right'
            ];
                return redirect()->route('departments.index')->with($notification);
        }
    }

    public function edit($id)
    {
        $result = $this->DepartmentsResponse->find($id);
            return view('master.data.department.edit',compact('result'));
    }

    public function update(Request $request, $id)
    {
        try {
            $this->DepartmentsResponse->update($request, $id);
            $notification = [
                'message'     => 'Successfully updated Data Department.',
                'alert-type'  => 'success',
                'gravity'     => 'bottom',
                'position'    => 'right'
            ];
                return redirect()->route('departments.index')->with($notification);
        } catch (\Throwable $th) {
            $notification = [
                'message'     => 'Failed to updated Data Department.',
                'alert-type'  => 'danger',
                'gravity'     => 'bottom',
                'position'    => 'right'
            ];
                return redirect()->route('departments.index')->with($notification);
        }
    }
}
