<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class showarchieveduser extends Model
{
    use HasFactory;
    protected $archieveduser = 'archievedusers'; // Specify the table name
    //public $timestamps = true; // Enable timestamps
}