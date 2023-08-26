<?php

namespace App\Http\Controllers\Admin\Master;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Master\SalaryCut\SalaryCutResponse;

class salaryCutController extends Controller
{
    protected $SalaryCutResponse;
    public function __construct(SalaryCutResponse $SalaryCutResponse)
    {
        $this->SalaryCutResponse = $SalaryCutResponse;
    }

        public function index(Request $request)
        {
            if($request->ajax()) {
                $result = $this->SalaryCutResponse->datatable();
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
                return view('master.data.salary_cut.index');
                    
        }

        public function create()
        {
            return view('master.data.salary_cut.create');
        }
}
