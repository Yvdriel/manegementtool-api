<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'company_id',
        'name',
        'date',
        'time_start',
        'time_end',
    ];
}
