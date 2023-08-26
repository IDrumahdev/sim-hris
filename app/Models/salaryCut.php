<?php

namespace App\Models;

use App\Helper\UUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class salaryCut extends Model
{
    use HasFactory, UUID;
    protected $keyType  = 'string';
    public $incrementing = false;

    protected $fillable = [
        'salary_cut_name','nominal','description'
    ];
}
