<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class job_seeker extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'password',
        'phone',
        'country_code',
        'area_of_work',
        'total_experience',
        'relevant_experience',
        'designation',
        'current_ctc',
        'expected_ctc',
        'current_company',
        // Add other fillable attributes here if any
    ];

}
