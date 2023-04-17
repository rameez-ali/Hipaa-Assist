<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Take_quiz;

class Quiz extends Model
{
    use HasFactory;

     protected $fillable = [
        'question_number','question','image','option1','option2','option3','option4','correct_answer'
    ];

    public function trainings()
    {
        return $this->belongsTo(Training::class, 'training_id','id');
    }

    public function take_quizzes()
    {
        return $this->hasMany(Take_quiz::class);
    }
}
