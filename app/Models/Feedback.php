<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    public function vendors()
    {
        return $this->belongsTo(Vendor::class, 'user_id','id');
    }
    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id','id');
    }
    public function companies()
    {
        return $this->belongsTo(Company::class, 'company_id','id');
    }
    public function trainings()
    {
        return $this->belongsTo(Training::class, 'training_id','id');
    }
}
