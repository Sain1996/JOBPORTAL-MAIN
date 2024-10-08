<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class companies extends Model
{
    use HasFactory;

    protected $table = 'dd_companies';

    protected $fillable = ['name'];

    public $timestamps = false;

}
