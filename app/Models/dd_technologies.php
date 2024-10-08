<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class dd_technologies extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'dd_technologies';
    public $timestamps = false;
    protected $fillable = ['technology', 'verified'];
}