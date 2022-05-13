<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodPlanMeal extends Model
{
    use HasFactory;

    protected $guarded = ['id','created_at','updated_at'];

    public function food_plan(){
        return $this->belongsTo(FoodPlan::class);
    }
}
