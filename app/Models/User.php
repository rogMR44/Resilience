<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasFactory, Notifiable;
    use Billable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    // relacion uno a muchos
    public function posts(){
        return $this->hasMany(Post::class);
    }
    public function userImage(){
        return $this->morphOne(UserImage::class,'imageable');
    }
    public function userMealPlan(){
        return $this->morphOne(UserMealPlan::class,'imageable');
    }
    public function food_plan_meal(){
        return $this->hasMany(FoodPlanMeal::class);
    }
    public function measurements(){
        return $this->hasOne(Measurement::class);    
    }
}