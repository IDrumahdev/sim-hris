<?php

namespace App\Models;

use App\Helper\UUID;
use App\Models\Employee;
use App\Models\salaryCut;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payroll extends Model
{
    use HasFactory, UUID;
    protected $keyType  = 'string';
    public $incrementing = false;

    protected $fillable = [
        'basic_salary','employee_id','allowance','total_salary'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class,'employee_id','id')->select('id','nip','full_name','mobilephone','job_title_id','department_id');
    }
}
