<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecurityPass extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'expiry_date',
        'expiry_date',
        'security_pass',
        'id_card'
    ];
}
