<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class job_post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 
        'years_of_experience', 
        'description', 
        'work_mode', 
        'post_date', 
        'status', 
        'company',
        'location',
        'email',
        'phone',
        'country_code',
    ];
    
    protected $table="job_posts";

}


