<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodPlanMealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_plan_meals', function (Blueprint $table) {
            $table->id();    
            
            $table->unsignedBigInteger('student_id');
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->time('meal_time')->nullable();

            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food_plan_meals');
    }
}
