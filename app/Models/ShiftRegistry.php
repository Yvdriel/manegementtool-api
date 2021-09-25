<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShiftRegistry extends Model
{
    use HasFactory;

    protected $fillable = [
        'shift_id',
        'user_id',
        'time_start',
        'time_end',
        'available',
        'approved',
        'approved_by'
    ];
}
