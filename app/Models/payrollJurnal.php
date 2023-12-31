<?php

namespace App\Models;

use App\Helper\UUID;
use App\Models\Payroll;
use App\Models\periodPayroll;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class payrollJurnal extends Model
{
    use HasFactory, UUID;
    protected $keyType  = 'string';
    public $incrementing = false;

    protected $fillable = [
        'payroll_id','period_payroll_id','date_payroll','take_home_pay','description'
    ];

    public function payroll()
    {
        return $this->belongsTo(Payroll::class,'payroll_id','id')->select('id','employee_id');
    }

    public function period_payroll()
    {
        return $this->belongsTo(periodPayroll::class,'period_payroll_id','id')->select('id','period_name');
    }
}
