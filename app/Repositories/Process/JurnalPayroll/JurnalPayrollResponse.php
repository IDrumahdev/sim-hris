<?php

namespace App\Repositories\Process\JurnalPayroll;

use Carbon\Carbon;
use App\Models\Payroll;
use App\Models\payrollJurnal;
use App\Models\periodPayroll;
use Illuminate\Support\Facades\DB;
use App\Repositories\Process\JurnalPayroll\JurnalPayrollDesign;

class JurnalPayrollResponse implements JurnalPayrollDesign {

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;
    protected $payroll;
    protected $periodPayroll;

    public function __construct(payrollJurnal $model, periodPayroll $periodPayroll, Payroll $payroll)
    {
        $this->model            = $model;
        $this->payroll          = $payroll;
        $this->periodPayroll    = $periodPayroll;
    }

    public function list()
    {
        return $this->model->select('payroll_id','period_payroll_id','date_payroll','take_home_pay','description','created_at')
                            ->with('payroll.employee.job_title')
                            ->with('payroll.employee.department');
    }

    public function periodPayroll()
    {
        return $this->periodPayroll->select('id','period_name')->latest()->get();
    }

    public function store($param)
    {
        $priod = $this->periodPayroll->select('status')
                                    ->whereId($param->period_payroll_id)
                                    ->first();
        if($priod->status === 1) {
            return 1;
        }
            DB::beginTransaction();
            try {
                $payrolls = $this->payroll->select('id','total_salary')->latest()->get();
                foreach ($payrolls as $payroll) {
                    $this->model->create([
                        'payroll_id'            => $payroll->id,
                        'period_payroll_id'     => $param->period_payroll_id,
                        'date_payroll'          => $param->date_payroll,
                        'take_home_pay'         => $payroll->total_salary,
                        'description'           => 'Periodic salary of employees every month.'
                    ]);
                }
                $this->periodPayroll->whereId($param->period_payroll_id)
                ->update([
                    'status' => true
                ]);
            } catch (\Throwable $th) {
                DB::rollBack();
            } finally {
                DB::commit();
            }
    }
}
