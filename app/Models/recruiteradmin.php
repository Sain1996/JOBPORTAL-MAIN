<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class recruiteradmin extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'secondname',
        'username',
        'companyname',
        'email',
        'password', 
        'subscription' 
    ];
          
}

