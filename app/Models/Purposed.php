<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purpose extends Model
{
    use HasFactory;
 protected $fillable = [
        'department_id',
        'user_id',
        'client_id',
        'purpose',
        'reason',
        
        
    ];
}
