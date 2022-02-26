<?php

namespace Database\Factories;

use App\Models\TeacherClass;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class TeacherClassFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TeacherClass::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'teacher_id' => User::all()->random()->id,
            'class_date' => $this->faker->date(),
            'class_start' => $this->faker->time(),
            'class_end' => $this->faker->time(),
            'status' => $this->faker->randomElement([1,2]),
            'class_link' => $this->faker->url,
        ];
    }
}
