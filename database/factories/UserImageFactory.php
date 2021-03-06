<?php

namespace Database\Factories;

use App\Models\UserImage;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserImage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'url'=> 'avatars/' . $this->faker->image('public/storage/avatars',400,400,null,false)//avatars/image.jpg
        ];
    }
}
