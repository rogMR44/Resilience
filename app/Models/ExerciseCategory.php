<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExerciseCategory extends Model
{
    use HasFactory;
    
    public function getRouteKeyName()
    {
        return "slug";
    }
    
    protected $fillable = ['name','slug'];


    // relacion uno a muchos
    public function posts(){
        return $this->hasMany(Exercise::class);
    }
}
