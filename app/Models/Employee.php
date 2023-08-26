<?php

namespace App\Models;

use App\Helper\UUID;
use App\Models\JobTitle;
use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory, UUID;
    protected $keyType  = 'string';
    public $incrementing = false;

    protected $fillable = [
        'nip','full_name','birth_day','gender','address','mobilephone','email','date_of_entry','job_title_id','department_id'
    ];

    public function job_title()
    {
        return $this->belongsTo(JobTitle::class,'job_title_id','id')->select('id','job_title_name');
    }

    public function department()
    {
        return $this->belongsTo(Department::class,'department_id','id')->select('id','department_name');
    }
}
