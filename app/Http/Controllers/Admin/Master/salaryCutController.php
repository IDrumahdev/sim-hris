<?php

namespace App\Http\Controllers\Admin\Master;

use Carbon\Carbon;
use App\Helper\IDR;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Data\SaleryCut\store;
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
                                            <a href="'.url(route('salary-cut.edit',$action->id)).'" type="button" class="btn btn-success btn-sm btn-size">
                                                Edit
                                            </a>
                                        ';
                            return $Edit;
                        })

                        ->editColumn('created_at', function ($created) {
                            $date = Carbon::create($created->created_at)->format('d-m-Y');
                            return $date;
                        })

                        ->editColumn('nominal', function ($data) {
                            return "Rp." . IDR::Format($data->nominal);
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

        public function store(store $request)
        {
            try {
                $this->SalaryCutResponse->store($request);
                $notification = [
                    'message'     => 'Successfully created Data Salary Cut.',
                    'alert-type'  => 'success',
                    'gravity'     => 'bottom',
                    'position'    => 'right'
                ];
                    return redirect()->route('salary-cut.index')->with($notification);
            } catch (\Throwable $th) {
                $notification = [
                    'message'     => 'Failed to created Data Salary Cut.',
                    'alert-type'  => 'danger',
                    'gravity'     => 'bottom',
                    'position'    => 'right'
                ];
                    return redirect()->route('salary-cut.index')->with($notification);
            }
        }

        public function edit($id)
        {
            $result = $this->SalaryCutResponse->find($id);
            return view('master.data.salary_cut.edit',compact('result'));
        }

        public function update(Request $request, $id)
        {
            try {
                $this->SalaryCutResponse->update($request, $id);
                $notification = [
                    'message'     => 'Successfully updated Data Salary Cut.',
                    'alert-type'  => 'success',
                    'gravity'     => 'bottom',
                    'position'    => 'right'
                ];
                    return redirect()->route('salary-cut.index')->with($notification);
            } catch (\Throwable $th) {
                $notification = [
                    'message'     => 'Failed to updated Data Salary Cut.',
                    'alert-type'  => 'danger',
                    'gravity'     => 'bottom',
                    'position'    => 'right'
                ];
                    return redirect()->route('salary-cut.index')->with($notification);
            }
        }
}
