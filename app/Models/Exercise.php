<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    public function getRouteKeyName()
    {
        return "slug";
    }

    protected $guarded = ['id','created_at','updated_at']; //campos a evitar llenar por asignacion masiva

    //relacion uno a muchos inversa
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function category(){
        return $this->belongsTo(ExerciseCategory::class);
    }
    public function imageX(){
        return $this->morphOne(ExerciseImageX::class,'imageable');
    }
    public function imageY(){
        return $this->morphOne(ExerciseImageY::class,'imageable');
    }
    public function imageZ(){
        return $this->morphOne(ExerciseImageZ::class,'imageable');
    }
}
