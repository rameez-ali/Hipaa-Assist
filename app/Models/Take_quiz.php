<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Quiz;

class Take_quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'status','name',
    ];


    public function quizzes()
    {
        return $this->belongsTo(Quiz::class, 'question_id','id');
    }

    


}
