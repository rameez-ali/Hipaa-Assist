<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Vendor extends Authenticatable
{
    use Notifiable;

    protected $guard = 'vendor';

    protected $fillable = [
           'firstname','lastname','email','phone', 'password','plain_password','category_id','training_id','company_id','amount','status'
        ];

    protected $hidden = [
            'password', 'remember_token',
        ];

    public function companies()
    {
        return $this->belongsTo(Company::class, 'company_id','id');
    }

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id','id');
    }

    public function trainings()
    {
        return $this->belongsTo(Training::class, 'training_id','id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }

    public function statuses()
    {
        return $this->belongsTo(Status::class, 'status','status');
    }

    public function user_trainings()
    {
        return $this->hasMany(User_training::class);
    }
 }