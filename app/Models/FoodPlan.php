<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodPlan extends Model
{
    use HasFactory;

    protected $guarded = ['id','created_at','updated_at'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function meals(){
        return $this->hasMany(FoodPlanMeal::class);
    }
}
