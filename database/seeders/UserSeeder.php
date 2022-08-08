<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\UserImage;
use App\Models\FoodPlan;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
           'name'=>'admin',
           'email'=>'admin@email.com',
           'password'=>bcrypt('12345678'),   
           'type'=>'1',        
        ]);
        $admin->attachRole('admin');
        $adminimg = UserImage::factory(1)->create([
            'imageable_id'=>$admin->id,
            'imageable_type'=>User::class,
        ]);

        $trainer1 = User::create([
            'name'=>'entrenador',
            'email'=>'entrenador@email.com',
            'password'=>bcrypt('12345678'),
            'type'=>'2',
         ]);
        $trainer1->attachRole('entrenador');
        $teacherimg = UserImage::factory(1)->create([
            'imageable_id'=>$trainer1->id,
            'imageable_type'=>User::class,
        ]);

        $student1 = User::create([
            'name'=>'asesorado',
            'email'=>'asesordo@email.com',
            'password'=>bcrypt('12345678'),
            'type'=>'3', 
        ]);
        $student1->attachRole('asesorado');
        $studentimg = UserImage::factory(1)->create([
            'imageable_id'=>$student1->id,
            'imageable_type'=>User::class,
        ]);
    }
}
