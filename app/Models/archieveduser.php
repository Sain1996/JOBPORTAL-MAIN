<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class archieveduser extends Model
{
    use HasFactory;
    protected $table = 'archievedusers'; // Specify the table name
    public $timestamps = true; // Enable timestamps
}