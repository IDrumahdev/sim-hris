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
                                    <a href="" type="button" class="btn btn-success btn-sm btn-size">
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
}
