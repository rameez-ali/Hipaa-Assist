<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users_training extends Model
{
    use HasFactory;

     protected $fillable = [
        'user_id','training_id','status',
    ];

     public function vendors()
    {
        return $this->belongsTo(Vendor::class, 'user_id','id');
    }

     public function trainings()
    {
        return $this->belongsTo(Training::class, 'training_id','id');
    }
   
}
