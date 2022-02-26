<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug','color'];

    public function getRouteKeyName()
    {
        return "slug";
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
