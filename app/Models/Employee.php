<?php

namespace App\Models;

use App\Helper\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory, UUID;
    protected $keyType  = 'string';
    public $incrementing = false;

    protected $fillable = [
        'nip','full_name','birth_day','gender','address','mobilephone','email','date_of_entry','job_title','department'
    ];
}
