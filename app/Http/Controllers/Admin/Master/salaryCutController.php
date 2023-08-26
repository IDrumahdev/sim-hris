<?php

namespace App\Http\Controllers\Admin\Master;

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
        // if($request->ajax()) {
            $result = $this->SalaryCutResponse->datatable();
                return DataTables::eloquent($result)
                    ->rawColumns(['action'])
                    ->escapeColumns(['action'])
                    ->smart(true)
                    ->make();
        // }
                
    }
}
