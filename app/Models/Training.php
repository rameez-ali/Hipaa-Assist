<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    protected $fillable = [
        'training_id','training_name','pass_percentage','description','image','status','category_id','amount'
    ];

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id','id');
    }

    public function quizes()
    {
    	return $this->hasMany(Quiz::class);
    }

    public function resources()
    {
    	return $this->hasMany(Resource::class);
    }

    public function vendors()
    {
        return $this->hasOne(Vendor::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }

    public function user_trainings()
    {
        return $this->hasMany(User_training::class);
    }



}
