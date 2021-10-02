<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'house_number',
        'house_number_extension',
        'city',
        'street',
        'postal_code',
        'document_path',
        'email',
    ];
}
