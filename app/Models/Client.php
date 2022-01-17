<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
      protected $fillable = [
        'fullname','address','phone','bhim',
        
    ];

    public function department(){
      return $this->BelongsTo(Department::class);

    }




     public function taskassign(){
     return $this->hasOne(Taskassign::class);
    }



     public function ticket(){
     return $this->hasOne(Ticket::class);
    }
}
