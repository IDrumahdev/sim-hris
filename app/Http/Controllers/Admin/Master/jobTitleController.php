<?php

namespace App\Http\Controllers\Admin\Master;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Master\JobTitle\JobTitleResponse;

class jobTitleController extends Controller
{
    protected $JobTitleResponse;
    public function __construct(JobTitleResponse $JobTitleResponse)
    {
        $this->JobTitleResponse = $JobTitleResponse;
    }

    public function index(Request $request)
    {
        if($request->ajax()) {
            $result = $this->JobTitleResponse->database();
                return DataTables::eloquent($result)
                
                ->addColumn('action', function ($action) {
                    $Edit   =   '
                                    <a href="'.url(route('jobTitle.edit',$action->id)).'" type="button" class="btn btn-success btn-sm btn-size">
                                        Edit
                                    </a>
                                ';
                    return $Edit;
                })

                ->editColumn('created_at', function ($created) {
                    $date = Carbon::create($created->created_at)->format('d-m-Y H:i:s');
                    return $date;
                })
                ->rawColumns(['action'])
                ->escapeColumns(['action'])
                ->smart(true)
                ->make();
        }
            return view('master.data.job_title.index');
    }

    public function create()
    {
        return view('master.data.job_title.create');
    }

    public function store(Request $request)
    {
        try {
            $this->JobTitleResponse->store($request);
            $notification = [
                'message'     => 'Successfully created Data Job Title.',
                'alert-type'  => 'success',
                'gravity'     => 'bottom',
                'position'    => 'right'
            ];
                return redirect()->route('jobTitle.index')->with($notification);
        } catch (\Throwable $th) {
            $notification = [
                'message'     => 'Failed to created Data Job Title.',
                'alert-type'  => 'danger',
                'gravity'     => 'bottom',
                'position'    => 'right'
            ];
                return redirect()->route('jobTitle.index')->with($notification);
        }
    }

    public function edit($id)
    {
        $result = $this->JobTitleResponse->find($id);
            return view('master.data.job_title.edit',compact('result'));
    }

    public function update(Request $request, $id)
    {
        try {
            $this->JobTitleResponse->update($request, $id);
            $notification = [
                'message'     => 'Successfully updated Data Job Title.',
                'alert-type'  => 'success',
                'gravity'     => 'bottom',
                'position'    => 'right'
            ];
                return redirect()->route('jobTitle.index')->with($notification);
        } catch (\Throwable $th) {
            $notification = [
                'message'     => 'Failed to updated Data Job Title.',
                'alert-type'  => 'danger',
                'gravity'     => 'bottom',
                'position'    => 'right'
            ];
                return redirect()->route('jobTitle.index')->with($notification);
        }
    }
}
