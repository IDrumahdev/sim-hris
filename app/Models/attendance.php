<?php

namespace App\Models;

use App\Helper\UUID;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class attendance extends Model
{
    use HasFactory, UUID;
    protected $keyType  = 'string';
    public $incrementing = false;

    protected $fillable = [
        'employee_id', 'date_attendance', 'check_in','check_out', 'description', 'status_attendance'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class,'employee_id','id')->select('id','nip','full_name');
    }
}
