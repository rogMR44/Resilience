<?php

namespace Database\Factories;

use App\Models\ReservedClass;
use App\Models\TeacherClass;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class ReservedClassFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ReservedClass::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'teacher_id' => User::all()->random()->id,            
            'student_id' => $this->faker->randomElement([3]),
            'teacher_class_id' => TeacherClass::all()->random()->id,
            'status'=> $this->faker->randomElement([1,2]),
        ];
    }
}
