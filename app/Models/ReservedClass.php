<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservedClass extends Model
{
    use HasFactory;

    protected $guarded = ['id','created_at','updated_at'];

    public function user(){
        return $this->belongsToMany(User::class);
    }
    public function teacherClasses(){
        return $this->belongsToMany(TeacherClass::class);
    }
}
